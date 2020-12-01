<?php

namespace App\Http\Controllers;
use App\Lib\SuzuriAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SemiOrderController extends Controller{

    

    public function index(){
        return view('pages.index');
    }
    public function create(Request $parameter) {

        if($parameter->input('item') == NULL){
            return view('pages.selectItem');
        } elseif($parameter->input('designId') == NULL) {
            return view('pages.selectDesign');
        } else {
            
            return view('pages.customizeDesign');
        }
        
    }
    public function make(Request $req){
        /* 本来はdesginIdから画像の保存場所を検索しもってく- DBで実装できる */
        $imagesUrl=asset('./image/orignal/bakuro.png');
        $color_hex = $req->input_color;
        $color=[hexdec(substr($color_hex, 1, 2)), hexdec(substr($color_hex, 3, 2)), hexdec(substr($color_hex, 5, 2))];
        
        //---関数にする：引数$imagesUrl, $color
        $imageSize = getimagesize($imagesUrl);
        $im = imagecreatefrompng($imagesUrl);
        imagesavealpha($im, true);//透明な部分は残す
        imagelayereffect($im, IMG_EFFECT_OVERLAY);//グレーの色を変更する

        imagefilledrectangle($im, 0, 0, $imageSize[0], $imageSize[1], imagecolorallocate($im, $color[0], $color[1], $color[2]));//色を変更
        
        //---ここまで関数にする
        header('Content-Type: image/png');
        $path = imagepng($im,'./image/create/logo.png');
        imagedestroy($im);
        $textureUrl=asset('/image/create/logo.png');
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
                            'itemId' => 1,
                            'published' => true,
                        )],
                    ],
                ];
                
        $result = SuzuriAPI::sendRequest('POST', 'https://suzuri.jp/api/v1/materials', $data);
        
        return view('pages.make', compact('result'));
    }
    
}

