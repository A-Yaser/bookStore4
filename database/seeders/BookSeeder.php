<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء الكتب
        $books = [
            [
                'title' => json_encode([
                    'en' => 'The Great Gatsby',
                    'ar' => 'غاتسبي العظيم'
                ]),
                'description' => json_encode([
                    'en' => 'A novel set in the Roaring Twenties...',
                    'ar' => 'رواية تدور أحداثها في العشرينيات المزدهرة...'
                ]),
                'pages_count' => 218,
                'status' => 'published',
                'release_date' => '1925-04-10',
                'price' => 20,
                'cover_image' => 'great_gatsby.jpg',
                'slug' => Str::slug('The Great Gatsby'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // أضف المزيد من الكتب هنا
        ];

        DB::table('books')->insert($books);

        // إضافة علاقات بين الكتب والمؤلفين
        DB::table('book_author')->insert([
            [
                'book_id' => 1, // ID الكتاب الأول
                'author_id' => 1, // ID المؤلف الأول
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // أضف المزيد من العلاقات هنا
        ]);

        // إضافة علاقات بين الكتب والتصنيفات
        DB::table('category_book')->insert([
            [
                'book_id' => 1, // ID الكتاب الأول
                'category_id' => 1, // ID التصنيف الأول
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // أضف المزيد من العلاقات هنا
        ]);

        // إضافة علاقات بين الكتب ودور النشر
        // DB::table('books')->where('id', 1)->update(['publisher_id' => 1]); // افترض أن الناشر الأول موجود
    }
}
