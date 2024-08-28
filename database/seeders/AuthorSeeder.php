<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => json_encode([
                    'en' => 'Gabriel García Márquez',
                    'ar' => 'غابرييل غارسيا ماركيز'
                ]),
                'bio' => json_encode([
                    'en' => 'Gabriel García Márquez was a Colombian novelist, short-story writer, and journalist.',
                    'ar' => 'غابرييل غارسيا ماركيز كان روائيًا وكاتبًا للقصص القصيرة وصحفيًا كولومبيًا.'
                ]),
                'photo' => 'gabriel_garcia_marquez.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'en' => 'Jane Austen',
                    'ar' => 'جين أوستن'
                ]),
                'bio' => json_encode([
                    'en' => 'Jane Austen was an English novelist known primarily for her six major novels.',
                    'ar' => 'جين أوستن كانت روائية إنجليزية معروفة بشكل رئيسي برواياتها الست الكبرى.'
                ]),
                'photo' => 'jane_austen.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // يمكنك إضافة المزيد من المؤلفين هنا بنفس الطريقة.
        ]);
    }
}
