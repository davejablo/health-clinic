<?php

use App\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::truncate();

        Medicine::create(['status' => 'OTC', 'name' => 'Acard', 'name_international' => 'Acetylsalicylic acid', 'form' => 'tabl. dojelitowe', 'dose' => '75 mg', 'package_quantity' => '30 szt.', 'price' => '7.71']);
        Medicine::create(['status' => 'RX', 'name' => 'Acenocumarol WZF', 'name_international' => 'Acenocoumarol', 'form' => 'tabl', 'dose' => '75mg', 'package_quantity' => '60 szt.', 'price' => '8.03']);
        Medicine::create(['status' => 'WMO', 'name' => 'Bobotic Forte', 'name_international' => 'Simeticone', 'form' => 'krople doustne', 'dose' => '135 mg', 'package_quantity' => '1 op. 30 ml', 'price' => '22.97']);
        Medicine::create(['status' => 'SD', 'name' => 'Allertec Wapno Plus', 'name_international' => 'Calcium
                            Colecalciferol', 'form' => 'tabl. mus.', 'dose' => 'null', 'package_quantity' => '20 szt.', 'price' => '7.93']);
        Medicine::create(['status' => 'RX', 'name' => 'Adrenalina WZF', 'name_international' => 'Epinephrine', 'form' => 'inj. [roztw.]', 'dose' => '0,3 mg/0,3 ml', 'package_quantity' => '1 amp.-strzyk. 1 ml', 'price' => '55.64']);
        Medicine::create(['status' => 'OTC', 'name' => 'Alka-Prim', 'name_international' => 'Acetylsalicylic acid', 'form' => 'tabl. mus.', 'dose' => '330 mg', 'package_quantity' => '10 szt.', 'price' => '11.61']);
        Medicine::create(['status' => 'SD', 'name' => 'Acidolac', 'name_international' => 'Bifidobacterium lactis
                            Lactobacillus acidophilus', 'form' => 'kaps.', 'dose' => 'null', 'package_quantity' => '10 szt.', 'price' => '12.70']);
        Medicine::create(['status' => 'SZ', 'name' => 'Acidolic', 'name_international' => 'Glucose', 'form' => 'prosz. do przyg. roztw. doust. [smak malinowy]', 'dose' => 'null', 'package_quantity' => '10 sasz. 4,4 g', 'price' => '19.08']);
        Medicine::create(['status' => 'LZ', 'name' => 'Biodacyna', 'name_international' => 'Amikacin', 'form' => 'inj. dom./inf. doż. [roztw.]', 'dose' => '125 mg/ml', 'package_quantity' => '1 amp. 2 ml', 'price' => '0.00']);
        Medicine::create(['status' => 'RX', 'name' => 'Cipronex', 'name_international' => 'Ciprofloxacin', 'form' => 'tabl. powl.', 'dose' => '250 mg', 'package_quantity' => '10 szt.', 'price' => '6.76']);
    }
}
