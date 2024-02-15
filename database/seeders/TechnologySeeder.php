<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
        {
            $tech_seed = ['Datastream','Data Bucket','Container','VM'];
            foreach($tech_seed as $tech){
                
                $new_tech = new Technology();
    
                $new_tech->title = $tech;
    
                $new_tech->slug = Str::of($tech)->slug('-');
                $new_tech->save();
            };
        }
    }

