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
    }
    
?>