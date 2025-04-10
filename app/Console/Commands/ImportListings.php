<?php

namespace App\Console\Commands;

use App\Models\Agent;
use App\Models\Facility;
use App\Models\Image;
use Illuminate\Console\Command;
use App\Models\Listing;
use SimpleXMLElement;

class ImportListings extends Command
{
    protected $signature = 'listings:import';
    protected $description = 'Import listings from XML and save them to the database';

    public function handle()
    {
        $url = 'https://xml.propspace.com/feed/xml.php?cl=3457&pid=8245&acc=8807';
        $xmlContent = file_get_contents($url);

        if (!$xmlContent) {
            $this->error('Failed to fetch XML content.');
            return;
        }

        $xml = new SimpleXMLElement($xmlContent);

        $fetchedPropertyRefNos = []; 

        foreach ($xml->Listing as $listing) {

            $agentId = $this->updateAgent($listing);
            $communityId = $this->updateCommunity($listing);

            $agentName = strtolower((string)$listing->Listing_Agent);
            $commercialAgents = [
                'belindi mearini',
                'bee mearini',
                'jake jones',
                'ashley scott',
            ];
            
            $isCommercial = false;
            foreach ($commercialAgents as $name) {
                if (str_contains($agentName, strtolower($name))) {
                    $isCommercial = true;
                    break;
                }
            }
            
            $type = $isCommercial ? 'Commercial' : 'Residential';


            $listingData = Listing::updateOrCreate(
                [
                    'property_ref_no' => (string)$listing->Property_Ref_No,
                ],
                [
                    'agent_id' => $agentId,
                    'community_id' => $communityId,
                    'ad_type' => (string)$listing->Ad_Type,
                    'unit_type' => (string)$listing->Unit_Type,
                    'unit_model' => (string)$listing->Unit_Model,
                    'primary_view' => (string)$listing->Primary_View,
                    'unit_builtup_area' => (float)$listing->Unit_Builtup_Area,
                    'no_of_bathroom' => (int)$listing->No_of_Bathroom,
                    'property_title' => (string)$listing->Property_Title,
                    'web_remarks' => (string)$listing->Web_Remarks,
                    'emirate' => (string)$listing->Emirate,
                    'community' => (string)$listing->Community,
                    'exclusive' => (int)$listing->Exclusive,
                    'cheques' => (int)$listing->Cheques,
                    'plot_area' => (float)$listing->Plot_Area,
                    'property_name' => (string)$listing->Property_Name,
                    'listing_agent' => (string)$listing->Listing_Agent,
                    'listing_agent_phone' => (string)$listing->Listing_Agent_Phone,
                    'listing_agent_photo' => (string)$listing->Listing_Agent_Photo,
                    'listing_agent_permit' => (string)$listing->Listing_Agent_Permit,
                    'listing_date' => $this->formatDate((string)$listing->Listing_Date), // Using formatDate
                    'last_updated' => $this->formatDate((string)$listing->Last_Updated), // Using formatDate
                    'bedrooms' => (string)$listing->Bedrooms,
                    'listing_agent_email' => (string)$listing->Listing_Agent_Email,
                    'price' => (float)$listing->Price,
                    'unit_reference_no' => (string)$listing->Unit_Reference_No,
                    'no_of_rooms' => (string)$listing->No_of_Rooms,
                    'latitude' => (float)$listing->Latitude,
                    'longitude' => (float)$listing->Longitude,
                    'unit_measure' => (string)$listing->unit_measure,
                    'featured' => (int)$listing->Featured,
                    'fitted' => (string)$listing->Fitted,
                    'company_name' => (string)$listing->company_name,
                    'web_tour' => (string)$listing->Web_Tour,
                    'threesixty_tour' => (string)$listing->Threesixty_Tour,
                    'virtual_tour' => (string)$listing->Virtual_Tour,
                    'qr_code' => (string)$listing->QR_Code,
                    'company_logo' => (string)$listing->company_logo,
                    'parking' => (int)$listing->Parking,
                    'preview_link' => (string)$listing->PreviewLink,
                    'strno' => (string)$listing->Strno,
                    'price_on_application' => (int)$listing->price_on_application,
                    'off_plan' => (int)$listing->off_plan,
                    'permit_number' => (string)$listing->permit_number,
                    'completion_status' => (string)$listing->completion_status,
                    'type' => $type,
                ]
            );

            // Add property_ref_no to fetched list
            $fetchedPropertyRefNos[] = (string)$listing->Property_Ref_No;

            if (isset($listing->Images->image)) {
                $this->updateImages($listingData->id, $listing->Images->image);
            }

            if (isset($listing->Facilities->facility)) {
                $this->updateFacilities($listingData->id, $listing->Facilities->facility);
            }

        }

        // Delete listings and related data that are not in the fetched XML
        $this->deleteMissingListings($fetchedPropertyRefNos);

        $this->info('Listings imported successfully.');
    }

    /**
     * Format XML date to MySQL datetime format
     */
    private function formatDate($dateString)
    {
        // Convert XML datetime format to standard MySQL datetime format
        $date = \DateTime::createFromFormat('Y-m-d h:i:s a', $dateString);

        if (!$date) {
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
        }

        // Return formatted date or null if conversion fails
        return $date ? $date->format('Y-m-d H:i:s') : null;
    }

    private function updateImages($listingId, $images)
    {
        // Get existing images for the listing
        $existingImages = Image::where('listing_id', $listingId)->pluck('url')->toArray();
        $newImages = [];

        foreach ($images as $image) {
            $newImages[] = (string)$image;
        }

        // Delete images that are not in the new data
        Image::where('listing_id', $listingId)
            ->whereNotIn('url', $newImages)
            ->delete();

        // Insert new images that do not exist
        foreach ($newImages as $imageUrl) {
            if (!in_array($imageUrl, $existingImages)) {
                Image::create([
                    'listing_id' => $listingId,
                    'url' => $imageUrl,
                ]);
            }
        }
    }

    private function updateFacilities($listingId, $facilities)
    {
        // Get listing instance
        $listing = Listing::find($listingId);
        $facilityIds = [];

        foreach ($facilities as $facilityName) {
            // Check if the facility exists, if not create it
            $facility = Facility::firstOrCreate(['name' => (string)$facilityName]);
            $facilityIds[] = $facility->id;
        }

        // Sync facilities to update, remove unlisted, and attach new ones
        $listing->facilities()->sync($facilityIds);
    }

    private function deleteMissingListings(array $fetchedPropertyRefNos)
    {
        // Get listings to delete
        $listingsToDelete = Listing::whereNotIn('property_ref_no', $fetchedPropertyRefNos)->get();

        foreach ($listingsToDelete as $listing) {
            // Delete related images and facilities
            Image::where('listing_id', $listing->id)->delete();
            $listing->facilities()->detach();

            // Delete listing
            $listing->delete();
        }
    }

    private function updateAgent($listing)
    {
        // Skip if email is empty or null
        $agentEmail = (string)$listing->Listing_Agent_Email;
        if (empty($agentEmail)) {
            return null;
        }

        $companyName = (string)$listing->company_name;
        $companyLogo = (string)$listing->company_logo;

        $company = null;
        if (!empty($companyName)) {
            $company = \App\Models\Company::updateOrCreate(
                ['name' => $companyName],
                ['icon' => $companyLogo]
            );
        }

        // Check if agent with the same email exists
        $agent =Agent::where('email', $agentEmail)->first();

        // If the agent does not exist, create a new agent
        if (!$agent) {
            $agent = Agent::create([
                'name' => (string)$listing->Listing_Agent,
                'photo' => (string)$listing->Listing_Agent_Photo,
                'phone' => (string)$listing->Listing_Agent_Phone,
                'permit' => (string)$listing->Listing_Agent_Permit,
                'email' => $agentEmail,
                'company_id' => $company?->id,
            ]);
        }elseif ($company && $agent->company_id !== $company->id) {
            // ✅ Optional: update agent's company if it has changed
            $agent->company_id = $company->id;
            $agent->save();
        }

        return $agent->id;
    }

    private function updateCommunity($listing)
{
    $communityName = (string)$listing->Community;

    // Skip if the community name is empty
    if (empty($communityName)) {
        return null;
    }

    // Check if the community exists, if not create it
    $community = \App\Models\Community::firstOrCreate(
        ['name' => $communityName],
        ['image' => null, 'emirates_id' => null]
    );

    return $community->id;
}
}

