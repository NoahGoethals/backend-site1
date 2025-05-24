<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Category;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Zorg dat de categorie 'Algemeen' bestaat
        $category = Category::firstOrCreate(['name' => 'Algemeen']);

        // Voeg een test-FAQ toe
        Faq::create([
            'question' => 'Hoe werkt deze site?',
            'answer' => 'Je navigeert via het menu.',
            'category_id' => $category->id,
            'published_at' => now(),
        ]);
    }
}
