<?php

namespace App\Console\Commands;

use App\Models\HolidayProperty;
use App\Models\HolidayPropertyPhoto;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class ImportHolidayProperties extends Command
{
    // The name and signature of the console command
    protected $signature = 'import:holiday-properties';

    // The console command description
    protected $description = 'Import holiday properties and their associated photos from an external URL feed.';

    // Execute the console command
    public function handle()
    {
        $url = 'https://expert.propertyfinder.ae/feed/elt/privatesite/b38fc7d5e650e8bd3088c48c6cab9afa';
        $xmlContent = file_get_contents($url);

        if (!$xmlContent) {
            $this->error('Failed to fetch XML content.');
            return;
        }

        $xml = new SimpleXMLElement($xmlContent);

        $fetchedPropertyRefNos = []; // To track fetched property reference numbers


        DB::beginTransaction();

        try {
            foreach ($xml->list as $propertyData) {
                // Insert holiday property
                $holidayProperty = HolidayProperty::create([
                    'reference_number' => $propertyData['reference_number'],
                    'offering_type' => $propertyData['offering_type'],
                    'property_type' => $propertyData['property_type'],
                    'price_on_application' => $propertyData['price_on_application'],
                    'price' => $propertyData['price'],
                    'rental_period' => $propertyData['rental_period'],
                    'city' => $propertyData['city'],
                    'community' => $propertyData['community'],
                    'sub_community' => $propertyData['sub_community'],
                    'title_en' => $propertyData['title_en'],
                    'description_en' => $propertyData['description_en'],
                    'amenities' => $propertyData['amenities'],
                    'size' => $propertyData['size'],
                    'bedroom' => $propertyData['bedroom'],
                    'bathroom' => $propertyData['bathroom'],
                    'parking' => $propertyData['parking'],
                    'agent_name' => $propertyData['agent_name'],
                    'agent_email' => $propertyData['agent_email'],
                    'agent_phone' => $propertyData['agent_phone'],
                    'agent_photo' => $propertyData['agent_photo'] ?? null,
                ]);

                // Insert holiday property photos
                if (isset($propertyData['photos']) && is_array($propertyData['photos'])) {
                    $holidayProperty->photos()->createMany(
                        array_map(fn($url) => ['url' => $url], $propertyData['photos'])
                    );
                }
            }

            DB::commit();
            $this->info('Holiday properties imported successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Get the data from the response.
     *
     * @param \Illuminate\Http\Response $response
     * @return array|null
     */
    protected function getDataFromResponse($response)
    {
        // Assuming the response is JSON
        $data = json_decode($response->getBody()->getContents(), true);

        if (!$data) {
            // If it's not JSON, handle accordingly (maybe XML or another format)
            $this->error('Invalid data format.');
            return null;
        }

        return $data;
    }
}

