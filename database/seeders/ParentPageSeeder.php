<?php

namespace Database\Seeders;

use App\Models\Modular\ParentPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ParentPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'slug' => Str::slug('Solutions'),
                'title' => 'Solutions',
            ],
            [
                'slug' => Str::slug('Specialization'),
                'title' => 'Specialization',
            ],
            [
                'slug' => Str::slug('Industries'),
                'title' => 'Industries',
            ],
            [
                'slug' => Str::slug('About Us'),
                'title' => 'About Us',
            ],
        ];

        ParentPage::truncate();

        foreach($items as $item){
            $item = ParentPage::create($item);
        }
    }
}
