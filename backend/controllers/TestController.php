<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/3
 * Time: 15:23
 */

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use xj\uploadify\UploadAction;
use yii\imagine\Image;

class TestController extends Controller
{

    public $enableCsrfValidation = false;
    public function actions() {
        return [
            's-upload' => [
                'class' => UploadAction::className(),
                'basePath' => '@webroot/upload',
                'baseUrl' => '@web/upload',
                'enableCsrf' => true, // default
                'postFieldName' => 'Filedata', // default
                //BEGIN METHOD
                'format' => [$this, 'methodName'],
                //END METHOD
                //BEGIN CLOSURE BY-HASH
                'overwriteIfExist' => true,
                'format' => function (UploadAction $action) {
                    $fileext = $action->uploadfile->getExtension();
                    $filename = sha1_file($action->uploadfile->tempName);
                    return "{$filename}.{$fileext}";
                },
                //END CLOSURE BY-HASH
                //BEGIN CLOSURE BY TIME
                'format' => function (UploadAction $action) {
                    $fileext = $action->uploadfile->getExtension();
                    $filehash = sha1(uniqid() . time());
                    $p1 = substr($filehash, 0, 2);
                    $p2 = substr($filehash, 2, 2);
                    return "{$p1}/{$p2}/{$filehash}.{$fileext}";
                },
                //END CLOSURE BY TIME
                'validateOptions' => [
                    'extensions' => ['jpg', 'png'],
                    'maxSize' => 1 * 1024 * 1024, //file size
                ],
                'beforeValidate' => function (UploadAction $action) {
                    //throw new Exception('test error');
                },
                'afterValidate' => function (UploadAction $action) {},
                'beforeSave' => function (UploadAction $action) {},
                'afterSave' => function (UploadAction $action) {
                    $action->output['fileUrl'] = $action->getWebUrl();
                    $action->output['fileFilename'] = $action->getFilename();
                    $action->output['SavePath'] = $action->getSavePath();
                    $action->getFilename(); // "image/yyyymmddtimerand.jpg"
                    $action->getWebUrl(); //  "baseUrl + filename, /upload/image/yyyymmddtimerand.jpg"
                    $action->getSavePath(); // "/var/www/htdocs/upload/image/yyyymmddtimerand.jpg"
                },
            ],
            'upload' => [
                'class' => 'cliff363825\kindeditor\KindEditorUploadAction',
                //'savePath' => '@webroot/upload',//图片保存的物理路径
                'savePath' => 'upload',//图片保存的物理路径
                //'saveUrl' => '@web/upload',//图片的 url
                'maxSize' => 2097152,//图片的限制
            ]
        ];
    }



    public function actionIndex(){

        //Yii::$app->test->test();
        //Yii::$app->test->print_r();
        echo Yii::$app->test->test;
        exit();

        //return $this->render('index');
        $img = "@backend/web/upload/image.jpg";

        //$path = Yii::getAlias("@backend/web/upload/image-crop.jpg");
        //Image::crop($img,200,200)->save($path,['qulity' => '100']);

       /* $path2 = Yii::getAlias("@backend/web/upload/image-thumb.jpg");
        Image::thumbnail($img,100,100,\Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)->save($path2,['qulity' => '100']);

        echo 'ok';
        exit();*/
        return $this->render('index');
    }

}