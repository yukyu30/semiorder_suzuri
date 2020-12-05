<?php 
    namespace App\Lib;
    use GuzzleHttp\Client;

    class SuzuriAPI{
        public static function sendRequest($method, $url, $data){
            $client = new Client();
            $response = $client->request($method, $url, $data);
    
            $post = $response->getBody();
            $json =json_decode($post, true);
            return $json;
        }
        public static function replaceItemImageUrl($url, $options){
            $url = str_replace('{width}', $options['image']['size'] , $url);
            $url = str_replace('{height}', $options['image']['size'] , $url);
            $url = str_replace('{size}', $options['item']['size'] , $url);
            $url = str_replace('{color}', $options['item']['color'] , $url);
            $url = str_replace('[/angle]', $options['item']['angle'] , $url);
            
            return $url;
        }
        public static function makeRequest($textureUrl, $design, $item, $suffix){
            $token = config('suzuri.suzuri_api_key');
            $data = [
                'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
                ],
                'json' => [
                    'texture' => $textureUrl,
                    'title' =>  $design->title . $suffix,
                    'price' => 400,
                    'products' => [array(
                        'itemId' => $item->id,
                        'published' => true,
                        'description' => 'BECCHUにてデザインされた' . $design->title . 'アイテムです.BECCHUで自分好みにカスタマイズしませんか？http://becchu.yu-9.work/'
                    )],
                ],
            ];

            return $data;
        }
    }
    
?>