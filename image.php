<?php
/**
 * Created by PhpStorm.
 * User: vladislavklimov
 * Date: 14/08/2019
 * Time: 01:23
 */
include_once "vendor/autoload.php";
use Intervention\Image\ImageManager as Image;

$manager = new Image();
$image = $manager->make('img/bg/team.jpg')
                 ->resize( null, 200, function ($image){
                        $image->aspectRatio();
                 })
                 ->rotate(45)
                 ->text(
                     "Kek lol arbidol",
                     5,
                     10
                 )
                 ->save('test.jpg', 80);
//$image = $manager->make('img/content/burger.png')->resize(300, 200);
echo $image->response('jpg');
