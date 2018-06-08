<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PokemonType;

class PokemonTypeController extends Controller
{

    public function index()
    {
        $pokemontypes = PokemonType::paginate(30);
        return view('pokemontype.index', compact('pokemontypes'));
    }

    public function curlDownloadPicture()
    {

        // $test_array = array("https://img.ljcdn.com/hdic-frame/e7a4b0a5-f7f9-4db8-8b97-9f386489e862.png!m_fill,w_120,h_80,lg_north_west,lx_0,ly_0,l_fbk,f_jpg,ls_50", "https://img.ljcdn.com/hdic-frame/e7a4b0a5-f7f9-4db8-8b97-9f386489e862.png!m_fill,w_120,h_80,lg_north_west,lx_0,ly_0,l_fbk,f_jpg,ls_50");

        //读取text文件，放入数组
        // $file = file_get_contents('text.txt');
        $file = file('F:/log/test.txt');
        // error_log(json_encode($file), 3, "F:/log/tt.log");
set_time_limit(0);

        foreach($file as $key => $value)
        {

            // 1. 初始化
             $ch = curl_init();
             $my_url = str_replace("\r\n", "", $value);
             // 2. 设置选项，包括URL
             curl_setopt($ch,CURLOPT_URL,$my_url);
             curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
             curl_setopt($ch,CURLOPT_HEADER,0);
             // 3. 执行并获取HTML文档内容
             $output = curl_exec($ch);
             if($output === FALSE ){
             echo "CURL Error:".curl_error($ch);
             }
             // $content = get_file_contents();

             //存文件 目前先使用put_file_content
             if($output)
             {
                 file_put_contents('F:/log/'.$key.'.jpg', $output);
             }


             // 4. 释放curl句柄
             curl_close($ch);
         }
    }
}
