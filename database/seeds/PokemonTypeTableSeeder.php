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
        // $pokemontypes = factory(PokemonType::class)->times(20)->make();
        // PokemonType::insert($pokemontypes->makeVisible(['name'])->toArray());

        //填充正确数据  pokemon的属性
        $array = array('水', '火', '草', '飞行', '冰', '普通', '虫', '格斗', '鬼', '恶', '龙', '电', '毒', '超能力', '岩石', '钢', '地面', '妖精');
        foreach ($array as $key => $value) {
            $content = array('name' => $value);
            DB::table('pokemon_types')->insert($content);
        }

    }
}
