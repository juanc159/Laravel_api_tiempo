<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = array(
            //venezuela
            array('name' => 'Apure','id_country' =>'1'),
            array('name' => 'Aragua','id_country' =>'1'),
            array('name' => 'Barinas','id_country' =>'1'),
            array('name' => 'Zulia','id_country' =>'1'),
            array('name' => 'Carabobo','id_country' =>'1'),

            //colombia
            array('name' => 'Antioquia','id_country' =>'2'),
            array('name' => 'Arauca','id_country' =>'2'),
            array('name' => 'Caldas','id_country' =>'2'),
            array('name' => 'Meta','id_country' =>'2'),
            array('name' => 'Santander','id_country' =>'2'),

            //brazil
            array('name' => 'Bahia','id_country' =>'3'),
            array('name' => 'Pernambuco','id_country' =>'3'),
            array('name' => 'Sergipe','id_country' =>'3'),
            array('name' => 'Rio de Janeiro	','id_country' =>'3'),
            array('name' => 'São Paulo','id_country' =>'3'),
            

            //andorra
            array('name' => 'Ordino','id_country' =>'4'),
            array('name' => 'La Massana','id_country' =>'4'),
            array('name' => 'Escaldes-Engordany','id_country' =>'4'),
            array('name' => 'Encamp','id_country' =>'4'),
            array('name' => 'Canillo','id_country' =>'4'),

            //austria
            array('name' => 'Australian Capital Territory','id_country' =>'5'),
            array('name' => 'Tasmania','id_country' =>'5'),
            array('name' => 'Queensland','id_country' =>'5'),
            array('name' => 'South Australia','id_country' =>'5'),
            array('name' => 'New South Wales','id_country' =>'5'),
        );

        foreach($ciudades as $ciudad){
            City::create($ciudad);
        }
    }
}
