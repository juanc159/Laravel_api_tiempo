<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = array(
            array(
                'cod' => 'VE',
                'name' =>'VENEZUELA'
            ),
            array(
                'cod' => 'CO',
                'name' =>'COLOMBIA'
            ),
            array(
                'cod' => 'BR',
                'name' =>'BRAZIL'
            ),
            array(
                'cod' => 'AD',
                'name' =>'ANDORRA'
            ),
            array(
                'cod' => 'AU',
                'name' =>'AUSTRALIA'
            ),
        );

        foreach($paises as $pais){
            Country::create($pais);
        }
    }
}
