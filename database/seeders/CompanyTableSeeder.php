<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'bangk.id',
                'slug' => 'bangk.id',
                'about' => 'Bangk.id adalah perusahaan yang berfokus pada penyediaan pelatihan dan pengembangan keterampilan di bidang teknologi informasi. Startup ini dapat menawarkan berbagai jenis kursus dan program pelatihan, seperti pengembangan web, data science, keamanan siber, pengembangan aplikasi seluler, dan lain sebagainya.',
                'ceo' => 'Ahmad Afrisal',
                'number_of_employees' => 100,
                'website_link' => 'www.bangk.id',
                'street' => 'Jl. Poros Majene Mamuju No 39',
                'postal_code' => '91545',
                'district' => 'Banggae Timur',
                'regency' => 'Majene',
                'province' => '',
                'image' => 'company-2.jpg',
                'logo' => 'bangkid.png',

            ],
            [
                'name' => 'Radio Kampus',
                'slug' => 'radio-kampus',
                'about' => 'Radio Kampus adalah  situs web yang menyediakan platform untuk mengadakan dan mengikuti webinar.',
                'ceo' => 'Arga Dianata',
                'number_of_employees' => 20,
                'website_link' => 'www.radiokampus.com',
                'street' => 'Jalan Andi Pangeran Pettarani No. 67',
                'postal_code' => '90222',
                'district' => 'Rappocini',
                'regency' => 'Makassar',
                'province' => 'Sulawesi Selatan',
                'image' => 'company-1.jpg',
                'logo' => 'radiokampus.png',
            ],
            [
                'name' => 'laodinawang',
                'slug' => 'laodinawang',
                'about' => 'laodinawang adalah usaha yang menyediakan alat dan perlengkapan camping untuk kegiatan di alam bebas, seperti tenda, sleeping bag, matras, kompor gas, pisau lipat, dan aksesori lainnya',
                'ceo' => 'Ayana See',
                'number_of_employees' => 10,
                'website_link' => 'www.laodinawang.com',
                'street' => 'Jalan Hasanuddin No. 10',
                'postal_code' => '91964',
                'district' => 'Mamuju',
                'regency' => 'Mamuju',
                'province' => 'Sulawesi Barat',
                'image' => 'company-4.jpg',
                'logo' => 'laodinawang.png',
            ],
            [
                'name' => 'triasih',
                'slug' => 'triasih',
                'about' => 'triasih adalah sebuah usaha yang menyediakan berbagai macam produk dan aksesori yang terkait dengan sistem mikrokontroler Arduino',
                'ceo' => 'Ahmad Afrisal',
                'number_of_employees' => 5,
                'website_link' => 'www.triasih.com',
                'street' => 'Jl. Poros Majene Mamuju No 39',
                'postal_code' => '91353',
                'district' => 'Banggae',
                'regency' => 'Majene',
                'province' => 'Sulawesi Barat',
                'image' => 'company-3.jpg',
                'logo' => 'triasih.png',
            ]
            ];
            
    foreach ($companies as $key => $company) {
        Company::create($company);
    }

    }

}
