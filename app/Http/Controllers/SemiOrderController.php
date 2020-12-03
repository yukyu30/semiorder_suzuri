<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
/* 自作した関数 */
use App\Lib\SuzuriAPI;
use App\Lib\ImageProc;

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
       
        $imageUrl=asset('/orignal/' . $design->file_path);// 画像の保存場所
        $color_hex = $parameter->input_color; // カラーコード
        $color=[hexdec(substr($color_hex, 1, 2)), hexdec(substr($color_hex, 3, 2)), hexdec(substr($color_hex, 5, 2))];//カラーコードをRGBの配列に変換
        
        
        $generatedImage = ImageProc::changeColor($imageUrl, $color); //画像処理

        $textureUrl = ImageProc::saveImage($generatedImage, 'generate', $design->uuid, $color_hex);//画像を保存し、そのパスを返す
        
        $data = SuzuriAPI::makeRequest($textureUrl, $design, $item, $color_hex);
   
        $result = SuzuriAPI::sendRequest('POST', 'https://suzuri.jp/api/v1/materials', $data);
        File::delete($textureUrl);

        return view('pages.make', compact('result'));
    }
    
}

