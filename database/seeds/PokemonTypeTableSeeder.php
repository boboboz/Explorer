<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PokemonType;

class PokemonTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('pokemon_types')->insert([
        //     'name' => str_random(10),
        // ]);
        $pokemontypes = factory(PokemonType::class)->times(20)->make();
        PokemonType::insert($pokemontypes->makeVisible(['name'])->toArray());
    }
}
