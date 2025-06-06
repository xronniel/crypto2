<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonecodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phone_codes')->delete();

        $countries = array(

        	// Records 01-99 (Afghanistan to India)

            array('iso' => 'AF', 'name' => 'Afghanistan', 'iso3' => 'AFG', 'numcode' => '4', 'phonecode' => '93'),
            array('iso' => 'AL', 'name' => 'Albania', 'iso3' => 'ALB', 'numcode' => '8', 'phonecode' => '355'),
            array('iso' => 'DZ', 'name' => 'Algeria', 'iso3' => 'DZA', 'numcode' => '12', 'phonecode' => '213'),
            array('iso' => 'AS', 'name' => 'American Samoa', 'iso3' => 'ASM', 'numcode' => '16', 'phonecode' => '1684'),
            array('iso' => 'AD', 'name' => 'Andorra', 'iso3' => 'AND', 'numcode' => '20', 'phonecode' => '376'),
            array('iso' => 'AO', 'name' => 'Angola', 'iso3' => 'AGO', 'numcode' => '24', 'phonecode' => '244'),
            array('iso' => 'AI', 'name' => 'Anguilla', 'iso3' => 'AIA', 'numcode' => '660', 'phonecode' => '1264'),
            array('iso' => 'AQ', 'name' => 'Antarctica', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '0'),
            array('iso' => 'AG', 'name' => 'Antigua and Barbuda', 'iso3' => 'ATG', 'numcode' => '28', 'phonecode' => '1268'),
            array('iso' => 'AR', 'name' => 'Argentina', 'iso3' => 'ARG', 'numcode' => '32', 'phonecode' => '54'),
            array('iso' => 'AM', 'name' => 'Armenia', 'iso3' => 'ARM', 'numcode' => '51', 'phonecode' => '374'),
            array('iso' => 'AW', 'name' => 'Aruba', 'iso3' => 'ABW', 'numcode' => '533', 'phonecode' => '297'),
            array('iso' => 'AU', 'name' => 'Australia', 'iso3' => 'AUS', 'numcode' => '36', 'phonecode' => '61'),
            array('iso' => 'AT', 'name' => 'Austria', 'iso3' => 'AUT', 'numcode' => '40', 'phonecode' => '43'),
            array('iso' => 'AZ', 'name' => 'Azerbaijan', 'iso3' => 'AZE', 'numcode' => '31', 'phonecode' => '994'),
            array('iso' => 'BS', 'name' => 'Bahamas', 'iso3' => 'BHS', 'numcode' => '44', 'phonecode' => '1242'),
            array('iso' => 'BH', 'name' => 'Bahrain', 'iso3' => 'BHR', 'numcode' => '48', 'phonecode' => '973'),
            array('iso' => 'BD', 'name' => 'Bangladesh', 'iso3' => 'BGD', 'numcode' => '50', 'phonecode' => '880'),
            array('iso' => 'BB', 'name' => 'Barbados', 'iso3' => 'BRB', 'numcode' => '52', 'phonecode' => '1246'),
            array('iso' => 'BY', 'name' => 'Belarus', 'iso3' => 'BLR', 'numcode' => '112', 'phonecode' => '375'),
            array('iso' => 'BE', 'name' => 'Belgium', 'iso3' => 'BEL', 'numcode' => '56', 'phonecode' => '32'),
            array('iso' => 'BZ', 'name' => 'Belize', 'iso3' => 'BLZ', 'numcode' => '84', 'phonecode' => '501'),
            array('iso' => 'BJ', 'name' => 'Benin', 'iso3' => 'BEN', 'numcode' => '204', 'phonecode' => '229'),
            array('iso' => 'BM', 'name' => 'Bermuda', 'iso3' => 'BMU', 'numcode' => '60', 'phonecode' => '1441'),
            array('iso' => 'BT', 'name' => 'Bhutan', 'iso3' => 'BTN', 'numcode' => '64', 'phonecode' => '975'),
            array('iso' => 'BO', 'name' => 'Bolivia', 'iso3' => 'BOL', 'numcode' => '68', 'phonecode' => '591'),
            array('iso' => 'BA', 'name' => 'Bosnia and Herzegovina', 'iso3' => 'BIH', 'numcode' => '70', 'phonecode' => '387'),
            array('iso' => 'BW', 'name' => 'Botswana', 'iso3' => 'BWA', 'numcode' => '72', 'phonecode' => '267'),
            array('iso' => 'BV', 'name' => 'Bouvet Island', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '0'),
            array('iso' => 'BR', 'name' => 'Brazil', 'iso3' => 'BRA', 'numcode' => '76', 'phonecode' => '55'),
            array('iso' => 'IO', 'name' => 'British Indian Ocean Territory', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '246'),
            array('iso' => 'BN', 'name' => 'Brunei Darussalam', 'iso3' => 'BRN', 'numcode' => '96', 'phonecode' => '673'),
            array('iso' => 'BG', 'name' => 'Bulgaria', 'iso3' => 'BGR', 'numcode' => '100', 'phonecode' => '359'),
            array('iso' => 'BF', 'name' => 'Burkina Faso', 'iso3' => 'BFA', 'numcode' => '854', 'phonecode' => '226'),
            array('iso' => 'BI', 'name' => 'Burundi', 'iso3' => 'BDI', 'numcode' => '108', 'phonecode' => '257'),
            array('iso' => 'KH', 'name' => 'Cambodia', 'iso3' => 'KHM', 'numcode' => '116', 'phonecode' => '855'),
            array('iso' => 'CM', 'name' => 'Cameroon', 'iso3' => 'CMR', 'numcode' => '120', 'phonecode' => '237'),
            array('iso' => 'CA', 'name' => 'Canada', 'iso3' => 'CAN', 'numcode' => '124', 'phonecode' => '1'),
            array('iso' => 'CV', 'name' => 'Cape Verde', 'iso3' => 'CPV', 'numcode' => '132', 'phonecode' => '238'),
            array('iso' => 'KY', 'name' => 'Cayman Islands', 'iso3' => 'CYM', 'numcode' => '136', 'phonecode' => '1345'),
            array('iso' => 'CF', 'name' => 'Central African Republic', 'iso3' => 'CAF', 'numcode' => '140', 'phonecode' => '236'),
            array('iso' => 'TD', 'name' => 'Chad', 'iso3' => 'TCD', 'numcode' => '148', 'phonecode' => '235'),
            array('iso' => 'CL', 'name' => 'Chile', 'iso3' => 'CHL', 'numcode' => '152', 'phonecode' => '56'),
            array('iso' => 'CN', 'name' => 'China', 'iso3' => 'CHN', 'numcode' => '156', 'phonecode' => '86'),
            array('iso' => 'CX', 'name' => 'Christmas Island', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '61'),
            array('iso' => 'CC', 'name' => 'Cocos (Keeling) Islands', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '672'),
            array('iso' => 'CO', 'name' => 'Colombia', 'iso3' => 'COL', 'numcode' => '170', 'phonecode' => '57'),
            array('iso' => 'KM', 'name' => 'Comoros', 'iso3' => 'COM', 'numcode' => '174', 'phonecode' => '269'),
            array('iso' => 'CG', 'name' => 'Congo', 'iso3' => 'COG', 'numcode' => '178', 'phonecode' => '242'),
            array('iso' => 'CD', 'name' => 'Congo, the Democratic Republic of the', 'iso3' => 'COD', 'numcode' => '180', 'phonecode' => '242'),
            array('iso' => 'CK', 'name' => 'Cook Islands', 'iso3' => 'COK', 'numcode' => '184', 'phonecode' => '682'),
            array('iso' => 'CR', 'name' => 'Costa Rica', 'iso3' => 'CRI', 'numcode' => '188', 'phonecode' => '506'),
            array('iso' => 'CI', 'name' => 'Cote D\'Ivoire', 'iso3' => 'CIV', 'numcode' => '384', 'phonecode' => '225'),
            array('iso' => 'HR', 'name' => 'Croatia', 'iso3' => 'HRV', 'numcode' => '191', 'phonecode' => '385'),
            array('iso' => 'CU', 'name' => 'Cuba', 'iso3' => 'CUB', 'numcode' => '192', 'phonecode' => '53'),
            array('iso' => 'CY', 'name' => 'Cyprus', 'iso3' => 'CYP', 'numcode' => '196', 'phonecode' => '357'),
            array('iso' => 'CZ', 'name' => 'Czech Republic', 'iso3' => 'CZE', 'numcode' => '203', 'phonecode' => '420'),
            array('iso' => 'DK', 'name' => 'Denmark', 'iso3' => 'DNK', 'numcode' => '208', 'phonecode' => '45'),
            array('iso' => 'DJ', 'name' => 'Djibouti', 'iso3' => 'DJI', 'numcode' => '262', 'phonecode' => '253'),
            array('iso' => 'DM', 'name' => 'Dominica', 'iso3' => 'DMA', 'numcode' => '212', 'phonecode' => '1767'),
            array('iso' => 'DO', 'name' => 'Dominican Republic', 'iso3' => 'DOM', 'numcode' => '214', 'phonecode' => '1809'),
            array('iso' => 'EC', 'name' => 'Ecuador', 'iso3' => 'ECU', 'numcode' => '218', 'phonecode' => '593'),
            array('iso' => 'EG', 'name' => 'Egypt', 'iso3' => 'EGY', 'numcode' => '818', 'phonecode' => '20'),
            array('iso' => 'SV', 'name' => 'El Salvador', 'iso3' => 'SLV', 'numcode' => '222', 'phonecode' => '503'),
            array('iso' => 'GQ', 'name' => 'Equatorial Guinea', 'iso3' => 'GNQ', 'numcode' => '226', 'phonecode' => '240'),
            array('iso' => 'ER', 'name' => 'Eritrea', 'iso3' => 'ERI', 'numcode' => '232', 'phonecode' => '291'),
            array('iso' => 'EE', 'name' => 'Estonia', 'iso3' => 'EST', 'numcode' => '233', 'phonecode' => '372'),
            array('iso' => 'ET', 'name' => 'Ethiopia', 'iso3' => 'ETH', 'numcode' => '231', 'phonecode' => '251'),
            array('iso' => 'FK', 'name' => 'Falkland Islands (Malvinas)', 'iso3' => 'FLK', 'numcode' => '238', 'phonecode' => '500'),
            array('iso' => 'FO', 'name' => 'Faroe Islands', 'iso3' => 'FRO', 'numcode' => '234', 'phonecode' => '298'),
            array('iso' => 'FJ', 'name' => 'Fiji', 'iso3' => 'FJI', 'numcode' => '242', 'phonecode' => '679'),
            array('iso' => 'FI', 'name' => 'Finland', 'iso3' => 'FIN', 'numcode' => '246', 'phonecode' => '358'),
            array('iso' => 'FR', 'name' => 'France', 'iso3' => 'FRA', 'numcode' => '250', 'phonecode' => '33'),
            array('iso' => 'GF', 'name' => 'French Guiana', 'iso3' => 'GUF', 'numcode' => '254', 'phonecode' => '594'),
            array('iso' => 'PF', 'name' => 'French Polynesia', 'iso3' => 'PYF', 'numcode' => '258', 'phonecode' => '689'),
            array('iso' => 'TF', 'name' => 'French Southern Territories', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '0'),
            array('iso' => 'GA', 'name' => 'Gabon', 'iso3' => 'GAB', 'numcode' => '266', 'phonecode' => '241'),
            array('iso' => 'GM', 'name' => 'Gambia', 'iso3' => 'GMB', 'numcode' => '270', 'phonecode' => '220'),
            array('iso' => 'GE', 'name' => 'Georgia', 'iso3' => 'GEO', 'numcode' => '268', 'phonecode' => '995'),
            array('iso' => 'DE', 'name' => 'Germany', 'iso3' => 'DEU', 'numcode' => '276', 'phonecode' => '49'),
            array('iso' => 'GH', 'name' => 'Ghana', 'iso3' => 'GHA', 'numcode' => '288', 'phonecode' => '233'),
            array('iso' => 'GI', 'name' => 'Gibraltar', 'iso3' => 'GIB', 'numcode' => '292', 'phonecode' => '350'),
            array('iso' => 'GR', 'name' => 'Greece', 'iso3' => 'GRC', 'numcode' => '300', 'phonecode' => '30'),
            array('iso' => 'GL', 'name' => 'Greenland', 'iso3' => 'GRL', 'numcode' => '304', 'phonecode' => '299'),
            array('iso' => 'GD', 'name' => 'Grenada', 'iso3' => 'GRD', 'numcode' => '308', 'phonecode' => '1473'),
            array('iso' => 'GP', 'name' => 'Guadeloupe', 'iso3' => 'GLP', 'numcode' => '312', 'phonecode' => '590'),
            array('iso' => 'GU', 'name' => 'Guam', 'iso3' => 'GUM', 'numcode' => '316', 'phonecode' => '1671'),
            array('iso' => 'GT', 'name' => 'Guatemala', 'iso3' => 'GTM', 'numcode' => '320', 'phonecode' => '502'),
            array('iso' => 'GN', 'name' => 'Guinea', 'iso3' => 'GIN', 'numcode' => '324', 'phonecode' => '224'),
            array('iso' => 'GW', 'name' => 'Guinea-Bissau', 'iso3' => 'GNB', 'numcode' => '624', 'phonecode' => '245'),
            array('iso' => 'GY', 'name' => 'Guyana', 'iso3' => 'GUY', 'numcode' => '328', 'phonecode' => '592'),
            array('iso' => 'HT', 'name' => 'Haiti', 'iso3' => 'HTI', 'numcode' => '332', 'phonecode' => '509'),
            array('iso' => 'HM', 'name' => 'Heard Island and Mcdonald Islands', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '0'),
            array('iso' => 'VA', 'name' => 'Holy See (Vatican City State)', 'iso3' => 'VAT', 'numcode' => '336', 'phonecode' => '39'),
            array('iso' => 'HN', 'name' => 'Honduras', 'iso3' => 'HND', 'numcode' => '340', 'phonecode' => '504'),
            array('iso' => 'HK', 'name' => 'Hong Kong', 'iso3' => 'HKG', 'numcode' => '344', 'phonecode' => '852'),
            array('iso' => 'HU', 'name' => 'Hungary', 'iso3' => 'HUN', 'numcode' => '348', 'phonecode' => '36'),
            array('iso' => 'IS', 'name' => 'Iceland', 'iso3' => 'ISL', 'numcode' => '352', 'phonecode' => '354'),
            array('iso' => 'IN', 'name' => 'India', 'iso3' => 'IND', 'numcode' => '356', 'phonecode' => '91'),


            // Records 100-199 (Indonesia to Spain)

            array('iso' => 'ID', 'name' => 'Indonesia', 'iso3' => 'IDN', 'numcode' => '360', 'phonecode' => '62'),
            array('iso' => 'IR', 'name' => 'Iran, Islamic Republic of', 'iso3' => 'IRN', 'numcode' => '364', 'phonecode' => '98'),
            array('iso' => 'IQ', 'name' => 'Iraq', 'iso3' => 'IRQ', 'numcode' => '368', 'phonecode' => '964'),
            array('iso' => 'IE', 'name' => 'Ireland', 'iso3' => 'IRL', 'numcode' => '372', 'phonecode' => '353'),
            array('iso' => 'IL', 'name' => 'Israel', 'iso3' => 'ISR', 'numcode' => '376', 'phonecode' => '972'),
            array('iso' => 'IT', 'name' => 'Italy', 'iso3' => 'ITA', 'numcode' => '380', 'phonecode' => '39'),
            array('iso' => 'JM', 'name' => 'Jamaica', 'iso3' => 'JAM', 'numcode' => '388', 'phonecode' => '1876'),
            array('iso' => 'JP', 'name' => 'Japan', 'iso3' => 'JPN', 'numcode' => '392', 'phonecode' => '81'),
            array('iso' => 'JO', 'name' => 'Jordan', 'iso3' => 'JOR', 'numcode' => '400', 'phonecode' => '962'),
            array('iso' => 'KZ', 'name' => 'Kazakhstan', 'iso3' => 'KAZ', 'numcode' => '398', 'phonecode' => '7'),
            array('iso' => 'KE', 'name' => 'Kenya', 'iso3' => 'KEN', 'numcode' => '404', 'phonecode' => '254'),
            array('iso' => 'KI', 'name' => 'Kiribati', 'iso3' => 'KIR', 'numcode' => '296', 'phonecode' => '686'),
            array('iso' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of', 'iso3' => 'PRK', 'numcode' => '408', 'phonecode' => '850'),
            array('iso' => 'KR', 'name' => 'Korea, Republic of', 'iso3' => 'KOR', 'numcode' => '410', 'phonecode' => '82'),
            array('iso' => 'KW', 'name' => 'Kuwait', 'iso3' => 'KWT', 'numcode' => '414', 'phonecode' => '965'),
            array('iso' => 'KG', 'name' => 'Kyrgyzstan', 'iso3' => 'KGZ', 'numcode' => '417', 'phonecode' => '996'),
            array('iso' => 'LA', 'name' => 'Lao People\'s Democratic Republic', 'iso3' => 'LAO', 'numcode' => '418', 'phonecode' => '856'),
            array('iso' => 'LV', 'name' => 'Latvia', 'iso3' => 'LVA', 'numcode' => '428', 'phonecode' => '371'),
            array('iso' => 'LB', 'name' => 'Lebanon', 'iso3' => 'LBN', 'numcode' => '422', 'phonecode' => '961'),
            array('iso' => 'LS', 'name' => 'Lesotho', 'iso3' => 'LSO', 'numcode' => '426', 'phonecode' => '266'),
            array('iso' => 'LR', 'name' => 'Liberia', 'iso3' => 'LBR', 'numcode' => '430', 'phonecode' => '231'),
            array('iso' => 'LY', 'name' => 'Libyan Arab Jamahiriya', 'iso3' => 'LBY', 'numcode' => '434', 'phonecode' => '218'),
            array('iso' => 'LI', 'name' => 'Liechtenstein', 'iso3' => 'LIE', 'numcode' => '438', 'phonecode' => '423'),
            array('iso' => 'LT', 'name' => 'Lithuania', 'iso3' => 'LTU', 'numcode' => '440', 'phonecode' => '370'),
            array('iso' => 'LU', 'name' => 'Luxembourg', 'iso3' => 'LUX', 'numcode' => '442', 'phonecode' => '352'),
            array('iso' => 'MO', 'name' => 'Macao', 'iso3' => 'MAC', 'numcode' => '446', 'phonecode' => '853'),
            array('iso' => 'MK', 'name' => 'Macedonia, the Former Yugoslav Republic of', 'iso3' => 'MKD', 'numcode' => '807', 'phonecode' => '389'),
            array('iso' => 'MG', 'name' => 'Madagascar', 'iso3' => 'MDG', 'numcode' => '450', 'phonecode' => '261'),
            array('iso' => 'MW', 'name' => 'Malawi', 'iso3' => 'MWI', 'numcode' => '454', 'phonecode' => '265'),
            array('iso' => 'MY', 'name' => 'Malaysia', 'iso3' => 'MYS', 'numcode' => '458', 'phonecode' => '60'),
            array('iso' => 'MV', 'name' => 'Maldives', 'iso3' => 'MDV', 'numcode' => '462', 'phonecode' => '960'),
            array('iso' => 'ML', 'name' => 'Mali', 'iso3' => 'MLI', 'numcode' => '466', 'phonecode' => '223'),
            array('iso' => 'MT', 'name' => 'Malta', 'iso3' => 'MLT', 'numcode' => '470', 'phonecode' => '356'),
            array('iso' => 'MH', 'name' => 'Marshall Islands', 'iso3' => 'MHL', 'numcode' => '584', 'phonecode' => '692'),
            array('iso' => 'MQ', 'name' => 'Martinique', 'iso3' => 'MTQ', 'numcode' => '474', 'phonecode' => '596'),
            array('iso' => 'MR', 'name' => 'Mauritania', 'iso3' => 'MRT', 'numcode' => '478', 'phonecode' => '222'),
            array('iso' => 'MU', 'name' => 'Mauritius', 'iso3' => 'MUS', 'numcode' => '480', 'phonecode' => '230'),
            array('iso' => 'YT', 'name' => 'Mayotte', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '269'),
            array('iso' => 'MX', 'name' => 'Mexico', 'iso3' => 'MEX', 'numcode' => '484', 'phonecode' => '52'),
            array('iso' => 'FM', 'name' => 'Micronesia, Federated States of', 'iso3' => 'FSM', 'numcode' => '583', 'phonecode' => '691'),
            array('iso' => 'MD', 'name' => 'Moldova, Republic of', 'iso3' => 'MDA', 'numcode' => '498', 'phonecode' => '373'),
            array('iso' => 'MC', 'name' => 'Monaco', 'iso3' => 'MCO', 'numcode' => '492', 'phonecode' => '377'),
            array('iso' => 'MN', 'name' => 'Mongolia', 'iso3' => 'MNG', 'numcode' => '496', 'phonecode' => '976'),
            array('iso' => 'MS', 'name' => 'Montserrat', 'iso3' => 'MSR', 'numcode' => '500', 'phonecode' => '1664'),
            array('iso' => 'MA', 'name' => 'Morocco', 'iso3' => 'MAR', 'numcode' => '504', 'phonecode' => '212'),
            array('iso' => 'MZ', 'name' => 'Mozambique', 'iso3' => 'MOZ', 'numcode' => '508', 'phonecode' => '258'),
            array('iso' => 'MM', 'name' => 'Myanmar', 'iso3' => 'MMR', 'numcode' => '104', 'phonecode' => '95'),
            array('iso' => 'NA', 'name' => 'Namibia', 'iso3' => 'NAM', 'numcode' => '516', 'phonecode' => '264'),
            array('iso' => 'NR', 'name' => 'Nauru', 'iso3' => 'NRU', 'numcode' => '520', 'phonecode' => '674'),
            array('iso' => 'NP', 'name' => 'Nepal', 'iso3' => 'NPL', 'numcode' => '524', 'phonecode' => '977'),
            array('iso' => 'NL', 'name' => 'Netherlands', 'iso3' => 'NLD', 'numcode' => '528', 'phonecode' => '31'),
            array('iso' => 'AN', 'name' => 'Netherlands Antilles', 'iso3' => 'ANT', 'numcode' => '530', 'phonecode' => '599'),
            array('iso' => 'NC', 'name' => 'New Caledonia', 'iso3' => 'NCL', 'numcode' => '540', 'phonecode' => '687'),
            array('iso' => 'NZ', 'name' => 'New Zealand', 'iso3' => 'NZL', 'numcode' => '554', 'phonecode' => '64'),
            array('iso' => 'NI', 'name' => 'Nicaragua', 'iso3' => 'NIC', 'numcode' => '558', 'phonecode' => '505'),
            array('iso' => 'NE', 'name' => 'Niger', 'iso3' => 'NER', 'numcode' => '562', 'phonecode' => '227'),
            array('iso' => 'NG', 'name' => 'Nigeria', 'iso3' => 'NGA', 'numcode' => '566', 'phonecode' => '234'),
            array('iso' => 'NU', 'name' => 'Niue', 'iso3' => 'NIU', 'numcode' => '570', 'phonecode' => '683'),
            array('iso' => 'NF', 'name' => 'Norfolk Island', 'iso3' => 'NFK', 'numcode' => '574', 'phonecode' => '672'),
            array('iso' => 'MP', 'name' => 'Northern Mariana Islands', 'iso3' => 'MNP', 'numcode' => '580', 'phonecode' => '1670'),
            array('iso' => 'NO', 'name' => 'Norway', 'iso3' => 'NOR', 'numcode' => '578', 'phonecode' => '47'),
            array('iso' => 'OM', 'name' => 'Oman', 'iso3' => 'OMN', 'numcode' => '512', 'phonecode' => '968'),
            array('iso' => 'PK', 'name' => 'Pakistan', 'iso3' => 'PAK', 'numcode' => '586', 'phonecode' => '92'),
            array('iso' => 'PW', 'name' => 'Palau', 'iso3' => 'PLW', 'numcode' => '585', 'phonecode' => '680'),
            array('iso' => 'PS', 'name' => 'Palestinian Territory, Occupied', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '970'),
            array('iso' => 'PA', 'name' => 'Panama', 'iso3' => 'PAN', 'numcode' => '591', 'phonecode' => '507'),
            array('iso' => 'PG', 'name' => 'Papua New Guinea', 'iso3' => 'PNG', 'numcode' => '598', 'phonecode' => '675'),
            array('iso' => 'PY', 'name' => 'Paraguay', 'iso3' => 'PRY', 'numcode' => '600', 'phonecode' => '595'),
            array('iso' => 'PE', 'name' => 'Peru', 'iso3' => 'PER', 'numcode' => '604', 'phonecode' => '51'),
            array('iso' => 'PH', 'name' => 'Philippines', 'iso3' => 'PHL', 'numcode' => '608', 'phonecode' => '63'),
            array('iso' => 'PN', 'name' => 'Pitcairn', 'iso3' => 'PCN', 'numcode' => '612', 'phonecode' => '0'),
            array('iso' => 'PL', 'name' => 'Poland', 'iso3' => 'POL', 'numcode' => '616', 'phonecode' => '48'),
            array('iso' => 'PT', 'name' => 'Portugal', 'iso3' => 'PRT', 'numcode' => '620', 'phonecode' => '351'),
            array('iso' => 'PR', 'name' => 'Puerto Rico', 'iso3' => 'PRI', 'numcode' => '630', 'phonecode' => '1787'),
            array('iso' => 'QA', 'name' => 'Qatar', 'iso3' => 'QAT', 'numcode' => '634', 'phonecode' => '974'),
            array('iso' => 'RE', 'name' => 'Reunion', 'iso3' => 'REU', 'numcode' => '638', 'phonecode' => '262'),
            array('iso' => 'RO', 'name' => 'Romania', 'iso3' => 'ROM', 'numcode' => '642', 'phonecode' => '40'),
            array('iso' => 'RU', 'name' => 'Russian Federation', 'iso3' => 'RUS', 'numcode' => '643', 'phonecode' => '70'),
            array('iso' => 'RW', 'name' => 'Rwanda', 'iso3' => 'RWA', 'numcode' => '646', 'phonecode' => '250'),
            array('iso' => 'SH', 'name' => 'Saint Helena', 'iso3' => 'SHN', 'numcode' => '654', 'phonecode' => '290'),
            array('iso' => 'KN', 'name' => 'Saint Kitts and Nevis', 'iso3' => 'KNA', 'numcode' => '659', 'phonecode' => '1869'),
            array('iso' => 'LC', 'name' => 'Saint Lucia', 'iso3' => 'LCA', 'numcode' => '662', 'phonecode' => '1758'),
            array('iso' => 'PM', 'name' => 'Saint Pierre and Miquelon', 'iso3' => 'SPM', 'numcode' => '666', 'phonecode' => '508'),
            array('iso' => 'VC', 'name' => 'Saint Vincent and the Grenadines', 'iso3' => 'VCT', 'numcode' => '670', 'phonecode' => '1784'),
            array('iso' => 'WS', 'name' => 'Samoa', 'iso3' => 'WSM', 'numcode' => '882', 'phonecode' => '684'),
            array('iso' => 'SM', 'name' => 'San Marino', 'iso3' => 'SMR', 'numcode' => '674', 'phonecode' => '378'),
            array('iso' => 'ST', 'name' => 'Sao Tome and Principe', 'iso3' => 'STP', 'numcode' => '678', 'phonecode' => '239'),
            array('iso' => 'SA', 'name' => 'Saudi Arabia', 'iso3' => 'SAU', 'numcode' => '682', 'phonecode' => '966'),
            array('iso' => 'SN', 'name' => 'Senegal', 'iso3' => 'SEN', 'numcode' => '686', 'phonecode' => '221'),
            array('iso' => 'CS', 'name' => 'Serbia and Montenegro', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '381'),
            array('iso' => 'SC', 'name' => 'Seychelles', 'iso3' => 'SYC', 'numcode' => '690', 'phonecode' => '248'),
            array('iso' => 'SL', 'name' => 'Sierra Leone', 'iso3' => 'SLE', 'numcode' => '694', 'phonecode' => '232'),
            array('iso' => 'SG', 'name' => 'Singapore', 'iso3' => 'SGP', 'numcode' => '702', 'phonecode' => '65'),
            array('iso' => 'SK', 'name' => 'Slovakia', 'iso3' => 'SVK', 'numcode' => '703', 'phonecode' => '421'),
            array('iso' => 'SI', 'name' => 'Slovenia', 'iso3' => 'SVN', 'numcode' => '705', 'phonecode' => '386'),
            array('iso' => 'SB', 'name' => 'Solomon Islands', 'iso3' => 'SLB', 'numcode' => '90', 'phonecode' => '677'),
            array('iso' => 'SO', 'name' => 'Somalia', 'iso3' => 'SOM', 'numcode' => '706', 'phonecode' => '252'),
            array('iso' => 'ZA', 'name' => 'South Africa', 'iso3' => 'ZAF', 'numcode' => '710', 'phonecode' => '27'),
            array('iso' => 'GS', 'name' => 'South Georgia and the South Sandwich Islands', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '0'),
            array('iso' => 'ES', 'name' => 'Spain', 'iso3' => 'ESP', 'numcode' => '724', 'phonecode' => '34'),


            // Records 200-253 (Sri Lanka to South Sudan)

            array('iso' => 'LK', 'name' => 'Sri Lanka', 'iso3' => 'LKA', 'numcode' => '144', 'phonecode' => '94'),
            array('iso' => 'SD', 'name' => 'Sudan', 'iso3' => 'SDN', 'numcode' => '736', 'phonecode' => '249'),
            array('iso' => 'SR', 'name' => 'Suriname', 'iso3' => 'SUR', 'numcode' => '740', 'phonecode' => '597'),
            array('iso' => 'SJ', 'name' => 'Svalbard and Jan Mayen', 'iso3' => 'SJM', 'numcode' => '744', 'phonecode' => '47'),
            array('iso' => 'SZ', 'name' => 'Swaziland', 'iso3' => 'SWZ', 'numcode' => '748', 'phonecode' => '268'),
            array('iso' => 'SE', 'name' => 'Sweden', 'iso3' => 'SWE', 'numcode' => '752', 'phonecode' => '46'),
            array('iso' => 'CH', 'name' => 'Switzerland', 'iso3' => 'CHE', 'numcode' => '756', 'phonecode' => '41'),
            array('iso' => 'SY', 'name' => 'Syrian Arab Republic', 'iso3' => 'SYR', 'numcode' => '760', 'phonecode' => '963'),
            array('iso' => 'TW', 'name' => 'Taiwan, Province of China', 'iso3' => 'TWN', 'numcode' => '158', 'phonecode' => '886'),
            array('iso' => 'TJ', 'name' => 'Tajikistan', 'iso3' => 'TJK', 'numcode' => '762', 'phonecode' => '992'),
            array('iso' => 'TZ', 'name' => 'Tanzania, United Republic of', 'iso3' => 'TZA', 'numcode' => '834', 'phonecode' => '255'),
            array('iso' => 'TH', 'name' => 'Thailand', 'iso3' => 'THA', 'numcode' => '764', 'phonecode' => '66'),
            array('iso' => 'TL', 'name' => 'Timor-Leste', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '670'),
            array('iso' => 'TG', 'name' => 'Togo', 'iso3' => 'TGO', 'numcode' => '768', 'phonecode' => '228'),
            array('iso' => 'TK', 'name' => 'Tokelau', 'iso3' => 'TKL', 'numcode' => '772', 'phonecode' => '690'),
            array('iso' => 'TO', 'name' => 'Tonga', 'iso3' => 'TON', 'numcode' => '776', 'phonecode' => '676'),
            array('iso' => 'TT', 'name' => 'Trinidad and Tobago', 'iso3' => 'TTO', 'numcode' => '780', 'phonecode' => '1868'),
            array('iso' => 'TN', 'name' => 'Tunisia', 'iso3' => 'TUN', 'numcode' => '788', 'phonecode' => '216'),
            array('iso' => 'TR', 'name' => 'Turkey', 'iso3' => 'TUR', 'numcode' => '792', 'phonecode' => '90'),
            array('iso' => 'TM', 'name' => 'Turkmenistan', 'iso3' => 'TKM', 'numcode' => '795', 'phonecode' => '7370'),
            array('iso' => 'TC', 'name' => 'Turks and Caicos Islands', 'iso3' => 'TCA', 'numcode' => '796', 'phonecode' => '1649'),
            array('iso' => 'TV', 'name' => 'Tuvalu', 'iso3' => 'TUV', 'numcode' => '798', 'phonecode' => '688'),
            array('iso' => 'UG', 'name' => 'Uganda', 'iso3' => 'UGA', 'numcode' => '800', 'phonecode' => '256'),
            array('iso' => 'UA', 'name' => 'Ukraine', 'iso3' => 'UKR', 'numcode' => '804', 'phonecode' => '380'),
            array('iso' => 'AE', 'name' => 'United Arab Emirates', 'iso3' => 'ARE', 'numcode' => '784', 'phonecode' => '971'),
            array('iso' => 'GB', 'name' => 'United Kingdom', 'iso3' => 'GBR', 'numcode' => '826', 'phonecode' => '44'),
            array('iso' => 'US', 'name' => 'United States', 'iso3' => 'USA', 'numcode' => '840', 'phonecode' => '1'),
            array('iso' => 'UM', 'name' => 'United States Minor Outlying Islands', 'iso3' => NULL,'numcode' => NULL,'phonecode' => '1'),
            array('iso' => 'UY', 'name' => 'Uruguay', 'iso3' => 'URY', 'numcode' => '858', 'phonecode' => '598'),
            array('iso' => 'UZ', 'name' => 'Uzbekistan', 'iso3' => 'UZB', 'numcode' => '860', 'phonecode' => '998'),
            array('iso' => 'VU', 'name' => 'Vanuatu', 'iso3' => 'VUT', 'numcode' => '548', 'phonecode' => '678'),
            array('iso' => 'VE', 'name' => 'Venezuela', 'iso3' => 'VEN', 'numcode' => '862', 'phonecode' => '58'),
            array('iso' => 'VN', 'name' => 'Viet Nam', 'iso3' => 'VNM', 'numcode' => '704', 'phonecode' => '84'),
            array('iso' => 'VG', 'name' => 'Virgin Islands, British', 'iso3' => 'VGB', 'numcode' => '92', 'phonecode' => '1284'),
            array('iso' => 'VI', 'name' => 'Virgin Islands, U.S.', 'iso3' => 'VIR', 'numcode' => '850', 'phonecode' => '1340'),
            array('iso' => 'WF', 'name' => 'Wallis and Futuna', 'iso3' => 'WLF', 'numcode' => '876', 'phonecode' => '681'),
            array('iso' => 'EH', 'name' => 'Western Sahara', 'iso3' => 'ESH', 'numcode' => '732', 'phonecode' => '212'),
            array('iso' => 'YE', 'name' => 'Yemen', 'iso3' => 'YEM', 'numcode' => '887', 'phonecode' => '967'),
            array('iso' => 'ZM', 'name' => 'Zambia', 'iso3' => 'ZMB', 'numcode' => '894', 'phonecode' => '260'),
            array('iso' => 'ZW', 'name' => 'Zimbabwe', 'iso3' => 'ZWE', 'numcode' => '716', 'phonecode' => '263'),
            array('iso' => 'RS', 'name' => 'Serbia', 'iso3' => 'SRB', 'numcode' => '688', 'phonecode' => '381'),
            array('iso' => 'AP', 'name' => 'Asia / Pacific Region', 'iso3' => '0', 'numcode' => '0', 'phonecode' => '0'),
            array('iso' => 'ME', 'name' => 'Montenegro', 'iso3' => 'MNE', 'numcode' => '499', 'phonecode' => '382'),
            array('iso' => 'AX', 'name' => 'Aland Islands', 'iso3' => 'ALA', 'numcode' => '248', 'phonecode' => '358'),
            array('iso' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'iso3' => 'BES', 'numcode' => '535', 'phonecode' => '599'),
            array('iso' => 'CW', 'name' => 'Curacao', 'iso3' => 'CUW', 'numcode' => '531', 'phonecode' => '599'),
            array('iso' => 'GG', 'name' => 'Guernsey', 'iso3' => 'GGY', 'numcode' => '831', 'phonecode' => '44'),
            array('iso' => 'IM', 'name' => 'Isle of Man', 'iso3' => 'IMN', 'numcode' => '833', 'phonecode' => '44'),
            array('iso' => 'JE', 'name' => 'Jersey', 'iso3' => 'JEY', 'numcode' => '832', 'phonecode' => '44'),
            array('iso' => 'XK', 'name' => 'Kosovo', 'iso3' => '---', 'numcode' => '0', 'phonecode' => '381'),
            array('iso' => 'BL', 'name' => 'Saint Barthelemy', 'iso3' => 'BLM', 'numcode' => '652', 'phonecode' => '590'),
            array('iso' => 'MF', 'name' => 'Saint Martin', 'iso3' => 'MAF', 'numcode' => '663', 'phonecode' => '590'),
            array('iso' => 'SX', 'name' => 'Sint Maarten', 'iso3' => 'SXM', 'numcode' => '534', 'phonecode' => '1'),
            array('iso' => 'SS', 'name' => 'South Sudan', 'iso3' => 'SSD', 'numcode' => '728', 'phonecode' => '211')
          );

          DB::table('phone_codes')->insert($countries);
    }
}
