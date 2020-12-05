<?php 
    namespace App\Lib;
    use Illuminate\Support\Facades\Storage;
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
            $imageName = $prefix . $suffix . '.png';
            $textureUrl='./dump/'. $imageName; // asset関数を使うと保存できないため使わない
            imagesavealpha($image, TRUE);
            header('Content-Type: image/png');
            $hasCreated = imagepng($image, $textureUrl);//画像として保存
            imagedestroy($image);
            return 'dump/' . $imageName;
        }
    }
?>