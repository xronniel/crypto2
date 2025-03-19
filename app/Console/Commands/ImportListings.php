<?php

namespace App\Console\Commands;

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

        foreach ($xml->Listing as $listing) {
            $listingData = Listing::updateOrCreate(
                [
                    'property_ref_no' => (string)$listing->Property_Ref_No,
                ],
                [
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
                ]
            );


            // Import Images
            if (isset($listing->Images->image)) {
                $this->saveImages($listingData->id, $listing->Images->image);
            }

            // Import Facilities
            if (isset($listing->Facilities->facility)) {
                $this->saveFacilities($listingData->id, $listing->Facilities->facility);
            }
        }

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

        /**
     * Save images to the database
     */
    private function saveImages($listingId, $images)
    {
        // Delete old images to avoid duplicates
        Image::where('listing_id', $listingId)->delete();

        foreach ($images as $image) {
            Image::create([
                'listing_id' => $listingId,
                'url' => (string)$image, 
            ]);
            
        }
    }

    /**
     * Save facilities to the database
     */
    private function saveFacilities($listingId, $facilities)
    {
        // Get listing instance
        $listing = Listing::find($listingId);
        $facilityIds = [];

        foreach ($facilities as $facilityName) {
            // Check if the facility exists, if not create it
            $facility = Facility::firstOrCreate(['name' => (string)$facilityName]);
            $facilityIds[] = $facility->id;
        }

        // Sync facilities to prevent duplicates
        $listing->facilities()->sync($facilityIds);
    }
}

