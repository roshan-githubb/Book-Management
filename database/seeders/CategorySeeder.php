<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    public function run()
    {
        
        Category::create([
            'name' => 'Fiction',
            'description' => 'Books that are based on imaginative content.',
        ]);
        
        Category::create([
            'name' => 'Non-Fiction',
            'description' => 'Books based on real facts and information.',
        ]);
        
   
    }
}
