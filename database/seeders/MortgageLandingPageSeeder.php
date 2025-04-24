<?php

namespace Database\Seeders;

use App\Models\MortgageLandingPage;
use App\Models\StepItem;
use App\Models\TrustItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MortgageLandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
         // Delete existing data
         TrustItem::truncate();
         StepItem::truncate();
         MortgageLandingPage::truncate();
        // Create the main Mortgage Landing Page
        $page = MortgageLandingPage::create([
            'hero_title' => 'Sample Hero Title - Can Edit in Admin Portal',
            'trust_section_title' => 'Sample Trust Section Title - Can Edit in Admin Portal',
            'trust_section_image' => 'placeholders/trust_section_image.jpg', // Placeholder image
            'step_section_title' => 'Sample Step Section Title - Can Edit in Admin Portal',
        ]);

        // Add Trust Items
        for ($i = 1; $i <= 3; $i++) {
            $page->trustItems()->create([
                'icon' => 'placeholders/trust_icon_' . $i . '.jpg', // Placeholder icon
                'title' => 'Sample Trust Item Title ' . $i . ' - Can Edit in Admin Portal',
                'description' => 'Sample Trust Item Description ' . $i . ' - Can Edit in Admin Portal',
            ]);
        }

        // Add Step Items
        for ($i = 1; $i <= 3; $i++) {
            $page->stepItems()->create([
                'icon' => 'placeholders/step_icon_' . $i . '.jpg', // Placeholder icon
                'title' => 'Sample Step Item Title ' . $i . ' - Can Edit in Admin Portal',
                'description' => 'Sample Step Item Description ' . $i . ' - Can Edit in Admin Portal',
            ]);
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
