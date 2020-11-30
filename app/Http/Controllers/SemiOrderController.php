<?php

namespace App\Http\Controllers;

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
    public function make(){
        $textureUrl='https://becchu.yu-9.work/image/orignal/pof.png';
        $url = 'http://suzuri.jp/api/v1/materials';
        $method = "POST";
        $token = config('suzuri.suzuri_api_key') ;

        $data = array(
            'texture' => $textureUrl,
            'title' => 'BECCHU',
            'price' => 400,
        );

        $client = new Client();

        $options = [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ]
        ];

        
        $response = $client->request($method, $url, $options);

        $post = $response->getBody();
        return json_decode($post, true);
    }
}

