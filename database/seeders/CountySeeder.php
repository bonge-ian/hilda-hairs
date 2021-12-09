<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{

    protected $counties = [
        '001' => 'Mombasa',
        '002' => 'Kwale',
        '003' => 'Kilifi',
        '004' => 'Tana River',
        '005' => 'Lamu',
        '006' => 'Taita-Taveta',
        '007' => 'Garissa',
        '008' => ' Wajir',
        '009' => 'Mandera',
        '010' => 'Marsabit',
        '011' => 'Isiolo',
        '012' => 'Meru',
        '013' => 'Tharaka-Nithi',
        '014' => 'Embu',
        '015' => 'Kitui',
        '016' => 'Machakos',
        '017' => 'Makueni',
        '018' => 'Nyandarua',
        '019' => 'Nyeri',
        '020' => 'Kirinyaga',
        '021' => 'Murang\'a',
        '022' => 'Kiambu',
        '023' => 'Turkana',
        '024' => 'West Pokot',
        '025' => 'Samburu',
        '026' => 'Trans Nzoia',
        '027' => 'Uasin Gishu',
        '028' => 'Elgeyo-Marakwet',
        '029' => 'Nandi',
        '030' => 'Baringo',
        '031' => 'Laikipia',
        '032' => 'Nakuru',
        '033' => 'Narok',
        '034' => 'Kajiado',
        '035' => 'Kericho',
        '036' => 'Bomet',
        '037' => 'Kakamega',
        '038' => 'Vihiga',
        '039' => 'Bungoma',
        '040' => 'Busia',
        '041' => 'Siaya',
        '042' => 'Kisumu',
        '043' => 'Homa Bay',
        '044' => 'Migori',
        '045' => 'Kisii',
        '046' => 'Nyamira',
        '047' => 'Nairobi County',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->counties)->each(
            fn ($county, $code) => County::create([
                'code' => $code,
                'name' => $county
            ])
        );
    }
}
