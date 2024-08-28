<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إدراج الفئات الرئيسية
        $categories = [
            [
                'name' => json_encode([
                    'en' => 'Fiction',
                    'ar' => 'خيال'
                ]),
                'description' => json_encode([
                    'en' => 'Fiction books including various genres like mystery, thriller, etc.',
                    'ar' => 'كتب الخيال التي تشمل أنواعًا مختلفة مثل الغموض، الإثارة، إلخ.'
                ]),
                'parent_id' => null,
                'slug' => 'fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Non-Fiction',
                    'ar' => 'غير خيال'
                ]),
                'description' => json_encode([
                    'en' => 'Non-Fiction books including biographies, history, etc.',
                    'ar' => 'كتب غير الخيال التي تشمل السير الذاتية، التاريخ، إلخ.'
                ]),
                'parent_id' => null,
                'slug' => 'non-fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);

        // إدراج الفئات الفرعية
        $subCategories = [
            [
                'name' => json_encode([
                    'en' => 'Mystery',
                    'ar' => 'غموض'
                ]),
                'description' => json_encode([
                    'en' => 'Books that involve solving a mystery or crime.',
                    'ar' => 'كتب تتعلق بحل لغز أو جريمة.'
                ]),
                'parent_id' => 1, // تشير إلى الفئة "Fiction"
                'slug' => 'mystery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Biography',
                    'ar' => 'سيرة ذاتية'
                ]),
                'description' => json_encode([
                    'en' => 'Books that tell the story of someone\'s life.',
                    'ar' => 'كتب تروي قصة حياة شخص ما.'
                ]),
                'parent_id' => 2, // تشير إلى الفئة "Non-Fiction"
                'slug' => 'biography',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($subCategories);
    }
}
