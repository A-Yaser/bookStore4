<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            [
                'name' => json_encode([
                    'en' => 'Penguin Random House',
                    'ar' => 'بنجوين راندوم هاوس'
                ]),
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'HarperCollins',
                    'ar' => 'هاربر كولينز'
                ]),
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Hachette Livre',
                    'ar' => 'هاشيت ليفر'
                ]),
                'country' => 'France',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Macmillan Publishers',
                    'ar' => 'ماكميلان للنشر'
                ]),
                'country' => 'UK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Simon & Schuster',
                    'ar' => 'سيمون وشوستر'
                ]),
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('publishers')->insert($publishers);
    }
}
