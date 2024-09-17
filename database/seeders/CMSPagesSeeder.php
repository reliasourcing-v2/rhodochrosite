<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CMSPagesSeeder extends Seeder
{
    protected $items = [
        [
            "slug" => "home",
            "label" => "Home Page",
            "show_metadata" => 1,
            "title" => 'Reliasourcing',
            "description" => 'Reliasourcing',
            "keywords" => 'Reliasourcing',
            "robots_follow" => "1",
            "robots_index" => "1",
            "og_image_path" => null,
        ],
        [
            "slug" => "contact-us",
            "label" => "Contact Us Page",
            "show_metadata" => 1,
            "title" => 'Contact Us',
            "description" => 'Contact Us',
            "keywords" => 'Contact Us',
            "robots_follow" => "1",
            "robots_index" => "1",
            "og_image_path" => null,
        ],
        [
            "slug" => "privacy-policy",
            "label" => "Privacy Policy Page",
            "show_metadata" => 1,
            "title" => 'Privacy Policy',
            "description" => 'Privacy Policy',
            "keywords" => 'Privacy Policy',
            "robots_follow" => "1",
            "robots_index" => "1",
            "og_image_path" => null,
        ],
        [
            "slug" => "terms-and-conditions",
            "label" => "Terms and Conditions Page",
            "show_metadata" => 1,
            "title" => 'Terms and Conditions',
            "description" => 'Terms and Conditions',
            "keywords" => 'Terms and Conditions',
            "robots_follow" => "1",
            "robots_index" => "1",
            "og_image_path" => null,
        ],
        [
            "slug" => "header",
            "label" => "General: Header",
            "show_metadata" => 0,
            "content" => [
                "section1_logo" => "cms_images/OnHzYeqgjJzw8aS6vYaXcLbBrUP544H6s3NFOsUu.png"
            ]
        ],
        [
            "slug" => "footer",
            "label" => "General: Footer",
            "show_metadata" => 0,
            "content" => [
                "section1_logo" => "cms_images/scWt86oJHcR1ulQv6umPFYrCO14kaChPUXzmTi7p.svg"
            ]
        ],
        [
            "slug" => "api_keys",
            "label" => "General: API Keys",
            "show_metadata" => 0,
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CmsPage::truncate();

        foreach($this->items as $index => $item) {
            CmsPage::create($item);
        }
    }
}
