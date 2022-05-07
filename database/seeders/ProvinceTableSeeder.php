<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        $provinces = array(
          array('id' =>1 , 'name' => 'Gauteng'),
          array('id' =>2 , 'name' => 'North West'),
          array('id' =>3 , 'name' => 'Mpumalanga'),
          array('id' =>4 , 'name' => 'Northen Cape'),
          array('id' =>5 , 'name' => 'Western Cape'),
          array('id' =>6 , 'name' => 'Eastern Cape'),
          array('id' =>7 , 'name' => 'Free State'),
          array('id' =>8 , 'name' => 'Kwazulu Natal'),
          array('id' =>9 , 'name' => 'Limpopo'),
        );
        DB::table('provinces')->insert($provinces);
    }
}
