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

        //自动添加的代码
        // $pokemontypes = factory(PokemonType::class)->times(20)->make();
        // PokemonType::insert($pokemontypes->makeVisible(['name'])->toArray());

        //填充正确数据  pokemon的属性
        // $array = array('水', '火', '草', '飞行', '冰', '普通', '虫', '格斗', '鬼', '恶', '龙', '电', '毒', '超能', '岩石', '钢', '地面', '妖精');
        // foreach ($array as $key => $value) {
        //     $content = array('name' => $value);
        //     DB::table('pokemon_types')->insert($content);
        // }

        //填充数据，带有属性值
        $normal = array(
                'name' => '普通',
                'name_en' => 'normal',
                'rock' => 0.5,
                'ghost' => 0,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($normal);

        $fire = array(
                'name' => '火',
                'name_en' => 'fire',
                'fire' => 0.5,
                'water' => 0.5,
                'grass' => 2.0,
                'ice' => 2.0,
                'bug' => 2.0,
                'rock' => 0.5,
                'dragon' =>0.5,
                'steel' => 2.0
        );
        DB::table('pokemon_types')->insert($fire);

        $water = array(
                'name' => '水',
                'name_en' => 'water',
                'fire' => 2.0,
                'water' => 0.5,
                'grass' => 0.5,
                'ground' => 2.0,
                'rock' => 2.0,
                'dragon' => 0.5
        );
        DB::table('pokemon_types')->insert($water);

        $grass = array(
                'name' => '草',
                'name_en' => 'grass',
                'fire' => 0.5,
                'water' => 2.0,
                'grass' => 0.5,
                'poison' => 0.5,
                'ground' => 2.0,
                'flying' => 0.5,
                'bug' => 0.5,
                'rock' => 2.0,
                'dragon' => 0.5,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($grass);

        $electr = array(
                'name' => '电',
                'name_en' => 'electr',
                'water' => 2.0,
                'grass' => 0.5,
                'electr' => 2.0,
                'ground' => 0,
                'flying' => 2.0,
                'dragon' => 0.5
        );
        DB::table('pokemon_types')->insert($electr);

        $ice = array(
                'name' => '冰',
                'name_en' => 'ice',
                'fire' => 0.5,
                'water' => 0.5,
                'grass' => 2.0,
                'ice' => 0.5,
                'ground' => 2.0,
                'flying' => 2.0,
                'dragon' => 2.0,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($ice);

        $fight = array(
                'name' => '格斗',
                'name_en' => 'fight',
                'normal' => 2.0,
                'ice' => 2.0,
                'poison' => 0.5,
                'flying' => 0.5,
                'psychic' => 0.5,
                'bug' => 0.5,
                'rock' => 2.0,
                'ghost' => 0,
                'dark' => 2.0,
                'steel' => 2.0,
                'fairy' => 0.5
        );
        DB::table('pokemon_types')->insert($fight);

        $poison = array(
                'name' => '毒',
                'name_en' => 'poison',
                'grass' => 2.0,
                'poison' => 0.5,
                'ground' => 0.5,
                'rock' => 0.5,
                'ghost' => 0.5,
                'steel' => 0,
                'fairy' => 2.0
        );
        DB::table('pokemon_types')->insert($poison);

        $ground = array(
                'name' => '地面',
                'name_en' => 'ground',
                'fire' => 2.0,
                'grass' => 0.5,
                'electr' => 2.0,
                'poison' => 2.0,
                'flying' => 0,
                'bug' => 0.5,
                'rock' => 2.0,
                'steel' => 2.0
        );
        DB::table('pokemon_types')->insert($ground);

        $flying = array(
                'name' => '飞行',
                'name_en' => 'flying',
                'grass' => 2.0,
                'electr' => 0.5,
                'fight' => 2.0,
                'bug' => 2.0,
                'rock' => 0.5,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($flying);

        $psychic = array(
                'name' => '超能',
                'name_en' => 'psychic',
                'fight' => 2.0,
                'poison' => 2.0,
                'psychic' => 0.5,
                'dark' => 0,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($psychic);

        $bug = array(
                'name' => '虫',
                'name_en' => 'bug',
                'fire' => 0.5,
                'grass' => 2.0,
                'fight' => 0.5,
                'poison' => 0.5,
                'flying' => 0.5,
                'psychic' => 2.0,
                'ghost' => 0.5,
                'dark' => 2.0,
                'steel' => 0.5,
                'fairy' => 0.5
        );
        DB::table('pokemon_types')->insert($bug);

        $rock = array(
                'name' => '岩石',
                'name_en' => 'rock',
                'fire' => 2.0,
                'ice' => 2.0,
                'fight' => 0.5,
                'ground' => 0.5,
                'flying' => 2.0,
                'bug' => 2.0,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($rock);

        $ghost = array(
                'name' => '鬼',
                'name_en' => 'ghost',
                'normal' => 0,
                'psychic' => 2.0,
                'ghost' => 2.0,
                'dark' => 0.5
        );
        DB::table('pokemon_types')->insert($ghost);

        $dragon = array(
                'name' => '龙',
                'name_en' => 'dragon',
                'dragon' => 2.0,
                'steel' => 0.5,
                'fairy' => 0
        );
        DB::table('pokemon_types')->insert($dragon);

        $dark = array(
                'name' => '恶',
                'name_en' => 'dark',
                'fight' => 0.5,
                'psychic' => 2.0,
                'ghost' => 2.0,
                'dark' => 0.5,
                'fairy' => 0.5
        );
        DB::table('pokemon_types')->insert($dark);

        $steel = array(
                'name' => '钢',
                'name_en' => 'steel',
                'fire' => 0.5,
                'water' => 0.5,
                'electr' => 0.5,
                'ice' => 2.0,
                'rock' => 2.0,
                'steel' => 0.5,
                'fairy' => 2.0
        );
        DB::table('pokemon_types')->insert($steel);

        $fairy = array(
                'name' => '妖精',
                'name_en' => 'fairy',
                'fire' => 0.5,
                'fight' => 2.0,
                'poison' => 0.5,
                'dragon' => 2.0,
                'dark' => 2.0,
                'steel' => 0.5
        );
        DB::table('pokemon_types')->insert($fairy);




    }
}
