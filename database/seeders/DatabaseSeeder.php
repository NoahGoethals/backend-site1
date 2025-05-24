<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Faq;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Voer de seeder uit voor de admin-gebruiker
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Voeg één categorie toe
        $category = Category::create([
            'name' => 'Algemeen',
        ]);

        // Voeg één voorbeeld-FAQ toe aan die categorie
        Faq::create([
            'question' => 'Hoe werkt deze site?',
            'answer' => 'Je navigeert via het menu.',
            'published_at' => now(),
            'category_id' => $category->id,
        ]);

    }
}
