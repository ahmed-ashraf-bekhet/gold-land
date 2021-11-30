<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaratsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karats = [
        	[
        		'key' => 'goldOunce', 
        		'title_en' => 'The price of an ounce of gold',
        		'title_ar' => 'سعر الأونصة الذهب'
        	],
        	[
        		'key' => 'gold24', 
        		'title_en' => 'Gram 24 karat',
        		'title_ar' => 'الجرام عيار 24'
        	],
        	[
        		'key' => 'gold22', 
        		'title_en' => 'Gram 22 caliber',
        		'title_ar' => 'الجرام عيار 22'
        	],
        	[
        		'key' => 'gold21', 
        		'title_en' => 'Gram 21 karat',
        		'title_ar' => 'الجرام عيار 21'
        	],
        	[
        		'key' => 'gold18', 
        		'title_en' => '18 karat gram',
        		'title_ar' => 'الجرام عيار 18'
        	],
        	[
        		'key' => 'silverOunce', 
        		'title_en' => 'Silver ounce',
        		'title_ar' => 'اونصة فضة'
        	],
        	[
        		'key' => 'silverKg', 
        		'title_en' => '1 kilo of silver',
        		'title_ar' => '1 كيلو فضة'
        	],
        	[
        		'key' => 'silverL', 
        		'title_en' => 'Silver Lira',
        		'title_ar' => 'ليرة فضة'
        	],
        	[
        		'key' => 'silver5', 
        		'title_en' => 'Pentagonal silver',
        		'title_ar' => 'مخمس فضه'
        	],
        	[
        		'key' => 'goldPure', 
        		'title_en' => '1 kilo of raw gold',
        		'title_ar' => '1 كيلو ذهب خام'
        	],
        	[
        		'key' => 'goldPurKg', 
        		'title_en' => '1 kilo of raw gold, commission',
        		'title_ar' => '1 كيلو ذهب خام بالعمولة'
        	],
        	[
        		'key' => 'goldPurHa', 
        		'title_en' => 'Half a kilo of raw gold, commission',
        		'title_ar' => 'نصف كيلو ذهب خام بالعمولة'
        	],
        	[
        		'key' => 'goldPurQa', 
        		'title_en' => 'A quarter of a kilo of raw gold, commission',
        		'title_ar' => 'ربع كيلو ذهب خام بالعمولة'
        	],
        	[
        		'key' => 'goldPurTa', 
        		'title_en' => '10 tola raw gold, commission',
        		'title_ar' => '10 تولة ذهب خام بالعمولة'
        	],
        	[
        		'key' => 'su100', 
        		'title_en' => 'Coated Swiss Bar 100 Grams',
        		'title_ar' => 'السبائك السويسرية المغلفة 100 جرام'
        	],
        	[
        		'key' => 'su50', 
        		'title_en' => 'Coated Swiss Bar 50 Grams',
        		'title_ar' => 'السبائك السويسرية المغلفة 50 جرام'
        	],
        	[
        		'key' => 'su31', 
        		'title_en' => 'Ounce coated swiss ingot',
        		'title_ar' => 'السبائك السويسرية المغلفة اونصة'
        	],
        	[
        		'key' => 'su20', 
        		'title_en' => 'Coated Swiss Bar 20 Grams',
        		'title_ar' => 'السبائك السويسرية المغلفة 20 جرام'
        	],
        	[
        		'key' => 'su10', 
        		'title_en' => 'Coated Swiss Bar 10 Gram',
        		'title_ar' => 'السبائك السويسرية المغلفة 10 جرام'
        	],
        	[
        		'key' => 'su5', 
        		'title_en' => 'Swiss bar coated 5 gram',
        		'title_ar' => 'السبائك السويسرية المغلفة 5 جرام'
        	],
        	[
        		'key' => 'su2', 
        		'title_en' => 'Coated Swiss Bar 2 Gram',
        		'title_ar' => 'السبائك السويسرية المغلفة 2 جرام'
        	],
        	[
        		'key' => 'su1', 
        		'title_en' => 'Coated Swiss Bar 1 Gram',
        		'title_ar' => 'السبائك السويسرية المغلفة 1 جرام'
        	],
        	[
        		'key' => 'em100', 
        		'title_en' => 'Emirates bullion coated 100 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 100 جرام'
        	],
        	[
        		'key' => 'em50', 
        		'title_en' => 'Emirates bullion coated 50 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 50 جرام'
        	],
        	[
        		'key' => 'em31', 
        		'title_en' => 'UAE bullion coated ounce',
        		'title_ar' => 'السبائك الاماراتية المغلفة اونصة'
        	],
        	[
        		'key' => 'em20', 
        		'title_en' => 'Emirates bullion coated 20 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 20 جرام'
        	],
        	[
        		'key' => 'em10', 
        		'title_en' => 'Emirates bullion coated 10 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 10 جرام'
        	],
        	[
        		'key' => 'em5', 
        		'title_en' => 'Emirates bullion coated 5 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 5 جرام'
        	],
        	[
        		'key' => 'em2', 
        		'title_en' => 'Emirates bullion coated 2 grams',
        		'title_ar' => 'السبائك الاماراتية المغلفة 2 جرام'
        	],
        	[
        		'key' => 'em1', 
        		'title_en' => 'Emirates bullion coated 1 gram',
        		'title_ar' => 'السبائك الاماراتية المغلفة 1 جرام'
        	],
        	[
        		'key' => 'lira', 
        		'title_en' => 'Lire',
        		'title_ar' => 'ليرة'
        	],
        	[
        		'key' => 'liraHa', 
        		'title_en' => 'Half a pound',
        		'title_ar' => 'نصف ليرة'
        	],
        	[
        		'key' => 'liraQa', 
        		'title_en' => 'A quarter of a pound',
        		'title_ar' => 'ربع ليرة'
        	],
        	[
        		'key' => 'liraKh', 
        		'title_en' => 'Pentagon',
        		'title_ar' => 'مخمس'
        	],
        	[
        		'key' => 'liraKhHa', 
        		'title_en' => 'Half pentagon',
        		'title_ar' => 'نصف مخمس'
        	],
        	[
        		'key' => 'pound', 
        		'title_en' => 'Pound 8 grams',
        		'title_ar' => 'جنيه 8جرام'
        	],
        	[
        		'key' => 'poundHa', 
        		'title_en' => 'Half a pound 4 grams',
        		'title_ar' => 'نصف جنيه 4جرام'
        	],
        ];
        \App\Models\Karat::insert($karats);
        /*foreach ($karats as $value)
        	Karat::create($value);*/
    }
}
