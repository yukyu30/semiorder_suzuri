<?php

namespace App\Http\Controllers;
use App\Lib\SuzuriAPI;
use App\Models\design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class SemiOrderController extends Controller{

    

    public function index(){
        return view( 'pages.index' );
    }

    public function create( Request $parameter ) {

        if( is_null($parameter->input( 'item' )) ){//アイテムを選択していない場合
            $items = DB::table('items')->select('id', 'name', 'humanize_name', 'icon_path')->get();
            return view('pages.selectItem', compact('items'));
        } elseif( is_null($parameter->input( 'design' )) ) {
            $designs = DB::table('designs')->select('uuid', 'title', 'file_path','created_at')->get();
            return view('pages.selectDesign', compact('designs'));
        } else {
            $item = DB::table('items')->where('id', $parameter->input( 'item' ))->first();
            $design = DB::table('designs')->where('uuid', $parameter->input( 'design' ))->first();
            return view('pages.customizeDesign', [ 'item' => $item, 'design' => $design]);
        }
        
    }
    public function make(Request $parameter){
        $item = DB::table('items')->where('id', $parameter->input( 'item' ))->first();
        $design = DB::table('designs')->where('uuid', $parameter->input( 'design' ))->first();
       
        $imagesUrl=asset($design->file_path);
        $color_hex = $parameter->input_color;
        $color=[hexdec(substr($color_hex, 1, 2)), hexdec(substr($color_hex, 3, 2)), hexdec(substr($color_hex, 5, 2))];
        
        //---関数にする：引数$imagesUrl, $color
        $imageSize = getimagesize($imagesUrl);
        $im = imagecreatefrompng($imagesUrl);
        imagesavealpha($im, true);//透明な部分は残す
        imagelayereffect($im, IMG_EFFECT_OVERLAY);//グレーの色を変更する

        imagefilledrectangle($im, 0, 0, $imageSize[0], $imageSize[1], imagecolorallocate($im, $color[0], $color[1], $color[2]));//色を変更
        
        //---ここまで関数にする
        header('Content-Type: image/png');
        $makeImgaePath = $design->uuid . $color_hex . 'png';
        $path = imagepng($im,'./image/create/'. $makeImgaePath);
        imagedestroy($im);
        $textureUrl=asset('./image/create/'. $makeImgaePath);
        $token = config('suzuri.suzuri_api_key');

        $data = [
                    'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'texture' => $textureUrl,
                        'title' => '馬喰電機-BECCHU-'.$color_hex,
                        'price' => 400,
                        'products' => [array(
                            'itemId' => $item->id,
                            'published' => true,
                        )],
                    ],
                ];
                
        $result = SuzuriAPI::sendRequest('POST', 'https://suzuri.jp/api/v1/materials', $data);
        
        return view('pages.make', compact('result'));
    }
    
}

