<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;
use App\Models\Agent;
use App\Models\Community;
use App\Models\Emirate;
use App\Models\Emirates;
use App\Models\PropertyPhoto;
use App\Models\SubCommunity;

class ImportEliteXML extends Command
{
    protected $signature = 'import:elite-xml';
    protected $description = 'Import property listings from Elite XML feed';

    public function handle()
    {
        $url = 'https://youtupia.net/eliteproperty/website/full.xml';
        $xmlString = file_get_contents($url);

        if (!$xmlString) {
            $this->error('Unable to fetch XML.');
            return;
        }

        $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        foreach ($xml->property as $item) {
            $propertyId = (string) $item['id'];
            $agentId = (string) $item->agent->id;

            // Save or update Agent
            $agent = Agent::updateOrCreate(
                ['email' => (string) $item->agent->email], // Use email as the unique identifier
                [
                    'name'       => (string) $item->agent->name,
                    'phone'      => (string) $item->agent->phone,
                    'license_no' => (string) $item->agent->license_no,
                ]
            );

            // Parse geopoints
            $geopoints = explode(',', (string) $item->geopoints);
            $latitude = $geopoints[0] ?? null;
            $longitude = $geopoints[1] ?? null;

            // Initialize IDs
            $emirateId = null;
            $communityId = null;
            $subCommunityId = null;

            // Only create Emirate if name is present
            if (trim((string) $item->city) !== '') {
                $emirate = Emirates::firstOrCreate(
                    ['name' => (string) $item->city],
                    ['image' => null,
                    'country_id' => 182] // Assuming country_id is always 182 for UAE
                );
                $emirateId = $emirate->id;

                // Only create Community if name is present
                if (trim((string) $item->community) !== '') {
                    $community = Community::firstOrCreate(
                        ['name' => (string) $item->community, 'emirates_id' => $emirateId],
                        ['image' => null]
                    );
                    $communityId = $community->id;

                    // Only create SubCommunity if name is present
                    if (trim((string) $item->sub_community) !== '') {
                        $subCommunity = SubCommunity::firstOrCreate(
                            ['name' => (string) $item->sub_community, 'community_id' => $communityId],
                            ['image' => null]
                        );
                        $subCommunityId = $subCommunity->id;
                    }
                }
            }

            // Save or update Property
            $property = Property::updateOrCreate(
                ['id' => $propertyId],
                [
                    'reference_number'     => (string) $item->reference_number,
                    'permit_number'        => (string) $item->permit_number,
                    'price'                => (float) $item->price,
                    'offering_type'        => (string) $item->offering_type,
                    'property_type'        => (string) $item->property_type,
                    'latitude'             => $latitude,
                    'longitude'            => $longitude,
                    'property_name'        => (string) $item->property_name,
                    'title_en'             => (string) $item->title_en,
                    'description_en'       => (string) $item->description_en,
                    'size'                 => (int) $item->size,
                    'bedroom'              => (int) $item->bedroom,
                    'bathroom'             => (int) $item->bathroom,
                    'price_on_application' => strtolower(trim((string) $item->price_on_application)) === 'yes',
                    'is_featured'          => (int) $item->is_featured,
                    'is_exclusive'         => (int) $item->is_exclusive,
                    'last_update'          => date('Y-m-d H:i:s', strtotime((string) $item['last_update'])),
                    'agent_id'             => $agent->id,
                    'emirate_id'           => $emirateId,
                    'community_id'         => $communityId,
                    'sub_community_id'     => $subCommunityId,
                ]
            );

            // Clear and add photos
            $property->photos()->delete();

            foreach ($item->photo->url as $url) {
                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'url'         => (string) $url,
                    'watermark'   => strtolower((string) $url['watermark']) === 'yes' ? 1 : 0,
                    'last_update' => date('Y-m-d H:i:s', strtotime((string) $url['last_update'])),
                ]);
            }

            $this->info("Property {$propertyId} imported.");
        }

        $this->info('✅ All properties imported successfully.');
    }
}
