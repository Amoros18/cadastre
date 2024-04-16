<?php

namespace Database\Seeders;

use App\Models\AncienData;
use App\Models\NouveauDossier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NouveauDossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'Amoros',
            'bureau'=>'Chef',
            'email'=>'amoros@gmail.com',
            'password'=>Hash::make('amoros'),
        ]);
        User::create([
            'name'=>'Bag',
            'bureau'=>'Bureau des affaires generale',
            'email'=>'bag@gmail.com',
            'password'=>Hash::make('bag'),
        ]);
        User::create([
            'name'=>'BMJ',
            'bureau'=>'Bureau de mise a jour',
            'email'=>'bmj@gmail.com',
            'password'=>Hash::make('bmj'),
        ]);
        User::create([
            'name'=>'BC',
            'bureau'=>'Bureau de controle',
            'email'=>'bc@gmail.com',
            'password'=>Hash::make('bc'),
        ]);
        User::create([
            'name'=>'GEOMETRE',
            'bureau'=>'Bureau de geometre',
            'email'=>'geometre@gmail.com',
            'password'=>Hash::make('geometre'),
        ]);
        User::create([
            'name'=>'Archivage',
            'bureau'=>'Archivage',
            'email'=>'archivage@gmail.com',
            'password'=>Hash::make('archivage'),
        ]);

        DB::table('ancien_data')->delete();
        AncienData::create([
            'name'=>'numero_visa',
            'last_value'=>'0000/23',
        ]);
        AncienData::create([
            'name'=>'numero_controle',
            'last_value'=>'0000/23',
        ]);
        AncienData::create([
            'name'=>'numero_mj',
            'last_value'=>'0000/23',
        ]);


        $fake = Faker::create('fr_FR');
        $nature = $fake->randomElement(['morcellement','gres a gres']);
        $zone = $fake->randomElement(['rural','urbaine']);
        $status = $fake->randomElement(['ancien','nouveau']);
        $observation = $fake->randomElement(['nikel','good','bien']);
        DB::table('nouveau_dossiers')->delete();

        for ($i = 0; $i < 50; $i++){
            NouveauDossier::create([
                //'numero_ouverture'=>$fake->unique()->bothify('###/####'),
                'numero_dossier'=>$fake->unique()->bothify('###/####'),
                'nom_requerant'=>$fake->name(),
                'telephone'=>$fake->numerify('6########'),
                'nature_dossier'=>$fake->name($nature),
                'arrondissement'=>$fake->city(),
                'zone'=>$fake->name($zone),
                'quartier'=>$fake->city(),
                'lieu_dit'=>$fake->city(),
                'mappe'=>$fake->numerify('#####'),
                'bloc'=>$fake->numerify('######'),
                'lot'=>$fake->numerify('#####'),
                'numero_feuille'=>$fake->numerify('###'),
                'date_ouverture'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'geometre'=>$fake->name(),
                'montant_recette'=>$fake->numerify('2######'),
                'cumule'=>$fake->numerify('####'),
                'superficie_recette'=>$fake->numerify('######'),
                'date_cession'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'numero_quittance'=>$fake->unique()->bothify('###H####'),
                'date_quittance'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'observation_recette'=>$fake->name($observation),
                'montant_rattachement'=>$fake->numerify('#####'),
                'date_rattachement'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'observation_rattachement'=>$fake->name(),
                'echelle'=>$fake->name(),
                'dao'=>$fake->name(),
                'point'=>$fake->url(),
                'longitude'=>$fake->name(),
                'latitude'=>$fake->name(),
                'superficie'=>$fake->numerify('#####'),
                'date_ccp'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'message_porter'=>$fake->name(),
                'mise_en_valeur'=>$fake->name(),
                'avis_main_courante'=>$fake->name($observation),
                'date_bornage'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'observation_main_courante'=>$fake->name(),
                's_c'=>$fake->name(),
                'numero_ccp'=>$fake->unique()->bothify('###/###'),
                'numero_controle'=>$fake->unique()->bothify('###/####'),
                'controlleur_1'=>$fake->name(),
                'date_controle_1'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'controlleur_2'=>$fake->name(),
                'date_controle_2'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'numero_mj'=>$fake->unique()->bothify('###/####'),
                'verificateur'=>$fake->name(),
                'avis_mj'=>$fake->name($observation),
                'numero_visa'=>$fake->unique()->bothify('###/####'),
                'date_visa'=>$fake->dateTimeBetween('-3 years','-0 years'),
                'status'=>$fake->name($status),
            ]);
        }
    }
}
