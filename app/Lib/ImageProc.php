<?php 
    namespace App\Lib;
    class ImageProc{
        public static function changeColor($imageUrl, $color){
        $imageSize = getimagesize($imageUrl);
        $im = imagecreatefrompng($imageUrl);
        imagesavealpha($im, true);//透明な部分は残す
        imagelayereffect($im, IMG_EFFECT_OVERLAY);//グレーの色を変更する
        imagefilledrectangle($im, 0, 0, $imageSize[0], $imageSize[1], imagecolorallocate($im, $color[0], $color[1], $color[2]));//色を変更
        return $im;
        
        }

        public static function saveImage($image, $storge, $prefix, $suffix){
            header('Content-Type: image/png');
            $imgaeName = $prefix . $suffix . 'png';
            $textureUrl=asset('/'. $storge .'/'. $imgaeName);
            $path = imagepng($image, $textureUrl);//画像として保存
            imagedestroy($image);
            return  $textureUrl=asset('/'. $storge .'/'. $imgaeName);
        }
    }
?>