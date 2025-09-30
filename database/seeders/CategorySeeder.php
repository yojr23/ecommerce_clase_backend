<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryPhones = new Category();
        $categoryPhones->name = 'Phones';
        $categoryPhones->save();
        

        $categoryComputers = new Category();
        $categoryComputers->name = 'Computers';
        $categoryComputers->save();


        $categoryTelevisions = new Category();
        $categoryTelevisions->name = 'Televisions';
        $categoryTelevisions->save();

        
    }
}
