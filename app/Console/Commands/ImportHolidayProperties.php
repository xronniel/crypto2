<?php

namespace App\Console\Commands;

use App\Models\Agent;
use App\Models\HolidayProperty;
use App\Models\HolidayPropertyAmenity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class ImportHolidayProperties extends Command
{
    protected $signature = 'import:holiday-properties';
    protected $description = 'Import holiday properties from XML feed';
    protected $feedUrl = 'https://expert.propertyfinder.ae/feed/elt/privatesite/b38fc7d5e650e8bd3088c48c6cab9afa';

    public function handle()
    {
       
        $this->info("Fetching data from {$this->feedUrl}...");
        
        try {
            $response = Http::get($this->feedUrl);
            
            if ($response->successful()) {
                $xml = new SimpleXMLElement($response->body());
                
                $count = 0;
                
                foreach ($xml->property as $property) {
                    $agentId = $this->updateAgent($property);
                    $geoPoints = explode(',', (string)$property->geopoints);
                    
                    $photos = [];
                    foreach ($property->photo->url as $photo) {
                        $photos[] = (string)$photo;
                    }
                    
                    $data = [
                        'reference_number' => (string)$property->reference_number,
                        'offering_type' => (string)$property->offering_type,
                        'property_type' => (string)$property->property_type,
                        'price_on_application' => strtolower((string)$property->price_on_application) === 'yes',
                        'price' => (float)$property->price,
                        'rental_period' => (string)$property->rental_period,
                        'city' => trim((string)$property->city),
                        'community' => trim((string)$property->community),
                        'sub_community' => isset($property->sub_community) ? trim((string)$property->sub_community) : null,
                        'property_name' => isset($property->property_name) ? trim((string)$property->property_name) : null,
                        'title_en' => trim((string)$property->title_en),
                        'description_en' => trim((string)$property->description_en),
                        'amenities' => (string)$property->amenities,
                        'size' => (float)$property->size,
                        'bedroom' => (int)$property->bedroom,
                        'bathroom' => (int)$property->bathroom,
                        'agent_id' => $agentId,
                        'agent_name' => trim((string)$property->agent->name),
                        'agent_email' => (string)$property->agent->email,
                        'agent_phone' => (string)$property->agent->phone,
                        'agent_license' => isset($property->agent->license_no) ? (string)$property->agent->license_no : null,
                        'agent_photo' => isset($property->agent->photo) ? (string)$property->agent->photo : null,
                        'parking' => (int)$property->parking,
                        'furnished' => isset($property->furnished) ? strtolower((string)$property->furnished) === 'yes' : false,
                        'photos' => json_encode($photos),
                        'latitude' => $geoPoints[1] ?? null,
                        'longitude' => $geoPoints[0] ?? null,
                        'last_update' => (string)$property['last_update'],
                    ];
                    
                    $holidayProperty = HolidayProperty::updateOrCreate(
                        ['reference_number' => $data['reference_number']],
                        $data
                    );

                    // Save photos
                    $holidayProperty->photos()->delete(); // Clear existing photos
                    $photos = [];
                    foreach ($property->photo->url as $photoUrl) {
                        $photos[] = ['url' => (string) $photoUrl, 'holiday_property_id' => $holidayProperty->id];
                    }
                    $holidayProperty->photos()->createMany($photos);

                    $amenityCodes = explode(',', (string)$property->amenities);
                    $amenityIds = [];
                    foreach ($amenityCodes as $code) {
                        $code = trim($code); // Trim whitespace
                        if (!empty($code)) {
                            // Check if the amenity already exists, or create it
                            $amenity = HolidayPropertyAmenity::firstOrCreate(
                                ['code' => $code],
                                ['name' => $code] // Use the code as the name if no name is provided
                            );
                            $amenityIds[] = $amenity->id; // Collect the amenity ID
                        }
                    }
                    
                    $holidayProperty->amenities()->sync($amenityIds);
                    
                    $count++;
                }
                
                $this->info("Successfully imported/updated {$count} properties.");
                return 0;
            }
            
            $this->error("Failed to fetch data. HTTP Status: {$response->status()}");
            return 1;
            
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
            return 1;
        }
    }

    private function updateAgent($property)
    {
        $agentEmail = (string)$property->agent->email;

        if (empty($agentEmail)) {
            return null;
        }

        // Check if agent with the same email exists
        $agent =Agent::where('email', $agentEmail)->first();

                // If the agent does not exist, create a new agent
                if (!$agent) {
                    $agent = Agent::create([
                        'name' => trim((string)$property->agent->name),
                        'photo' => isset($property->agent->photo) ? (string)$property->agent->photo : null,
                        'phone' => (string)$property->agent->phone,
                        'permit' =>  isset($property->agent->license_no) ? (string)$property->agent->license_no : null,
                        'email' => $agentEmail,
                    ]);
                }
        
        return $agent->id;
    }
}