<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Category;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $cat = Category::firstOrCreate(['name' => 'Algemeen']);

        Faq::create([
            'question' => 'Hoe werkt deze website?',
            'answer' => 'Deze site toont veelgestelde vragen per categorie.',
            'category_id' => $cat->id,
            'published_at' => now(),
        ]);
    }
}
