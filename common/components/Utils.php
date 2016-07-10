<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 23:55
 */

namespace common\components;

use yii\base\Component;
use Yii;
use yii\imagine\Image;

class Utils extends  Component
{
    /**生成缩略图
     * @param $fileImage 文件名称
     * @param $width
     * @param $height
     * @return string
     */
    public function createThumbnail($fileImage,$width,$height,$quality = 100){

        //$thumbnailDir = Yii::getAlias('@webroot/upload/thumbnai');
        $thumbnailDir = Yii::getAlias('@frontend/web/upload/thumbnai/');
        if(!is_dir($thumbnailDir)){
            @mkdir($thumbnailDir);
        }
        //生成缩略图
        //$fileImage = $action->getFilename();
        $suffixPoint = strrpos($fileImage,'.');
        $thumbFileName = substr($fileImage,0,$suffixPoint).'-'.$width.'x'.$height.substr($fileImage,$suffixPoint);
        Image::thumbnail('@frontend/web/upload/'.$fileImage,$width,$height,\Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)->save($thumbnailDir.$thumbFileName,['quality' => $quality]);

        return Yii::getAlias('@frontendUrl/web/upload/thumbnai/').$thumbFileName;

    }



}