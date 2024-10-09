<?php

namespace Database\Seeders;

use App\Models\Licence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class licenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Licence::create([
           'name'=>'C1',
        ]);
        Licence::create([
            'name'=>'C2',
         ]);
         Licence::create([
            'name'=>'C3',
         ]);
    }
}
