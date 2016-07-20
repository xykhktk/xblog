<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 21:36
 */

namespace backend\controllers;

use yii\web\Controller;
use xj\uploadify\UploadAction;
use yii\data\Pagination;
use Yii;
use yii\imagine\Image;
use common\models\Category;
use common\models\Article;
use common\models\ArticleTags;
use common\models\Tags;

class ArticleController extends BaseController
{

    public function actions() {
        return [
            's-upload' => [
                'class' => UploadAction::className(),
                //'basePath' => '@webroot/web/upload',
                'basePath' => '@frontend/web/upload',
                //'baseUrl' => '@web/upload',
                'baseUrl' => '@frontendUrl/web/upload',
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
                /*'format' => function (UploadAction $action) { //将会在upload文件夹下再生成2个文件夹。我不需要这样。
                    $fileext = $action->uploadfile->getExtension();
                    $filehash = sha1(uniqid() . time());
                    $p1 = substr($filehash, 0, 2);
                    $p2 = substr($filehash, 2, 2);
                    return "{$p1}/{$p2}/{$filehash}.{$fileext}";
                },*/
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
            //$action->output['fileUrl'] = $action->getWebUrl();
            //$action->getFilename(); // "image/yyyymmddtimerand.jpg"
            //$action->getWebUrl(); //  "baseUrl + filename, /upload/image/yyyymmddtimerand.jpg"
            //$action->getSavePath(); // "/var/www/htdocs/upload/image/yyyymmddtimerand.jpg"

             /*$thumbnailDir = Yii::getAlias('@webroot/upload/thumbnai');
             if(!is_dir($thumbnailDir)){
                 @mkdir($thumbnailDir);
             }*/
                 //生成缩略图
            /* $fileImg = substr($action->getFilename(),5) ; //在我的版本中，$action->getFilename()的值是 46/6e/466eaf225174e2206083f125319036bbce842ef3.jpg
             //而在视频中，是类似 466eaf225174e2206083f125319036bbce842ef3.jpg 这样的地址
             //所以在保存缩略图时，如果不去掉前面的46/6e，就会保存错误，因为这个插件不会自动创建文件夹。
             $suffixPoint = strrpos($fileImg,'.');
             $thumbFileName = substr($fileImg,0,$suffixPoint).'-100x100'.substr($fileImg,$suffixPoint);
             Image::thumbnail($action->getSavePath(),100,100,\Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)->save($thumbnailDir.$thumbFileName,['quality' => '100']);

             $action->output['thumbImg'] = Yii::getAlias('@web/upload/thumbnai') .$thumbFileName;
             $action->output['img'] = substr($fileImg,1) ;*/
             //$action->output['thumbnailDir'] = $thumbnailDir;
             //$action->output['thumbFileName'] = $thumbFileName;
             //$action->output['fileImg'] = $fileImg;

             /*$thumbnailDir = Yii::getAlias('@frontend/web/upload/thumbnai/');
             if(!is_dir($thumbnailDir)){
                   @mkdir($thumbnailDir);
              }

             $fileImg = $action->getFilename() ; //。
             $suffixPoint = strrpos($fileImg,'.');
             $thumbFileName = substr($fileImg,0,$suffixPoint).'-100x100'.substr($fileImg,$suffixPoint);
             Image::thumbnail('@frontend/web/upload/'.$fileImg,100,100,\Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)->save($thumbnailDir.$thumbFileName,['quality' => '100']);

             $action->output['thumbImg'] = Yii::getAlias('@frontendUrl/web/upload/thumbnai/') .$thumbFileName;
             $action->output['img'] =$fileImg ;*/

             //$action->output['thumbnailDir'] = $thumbnailDir;
             //$action->output['thumbFileName'] = $thumbFileName;
             //$action->output['fileImg'] = $fileImg;

             $action->output['thumbImg'] = Yii::$app->utils->createThumbnail($action->getFilename(),100,100);
             //注意这里utils 要和Dcommon\config\main.php 保持一致
             $action->output['img'] = $action->getFilename();
             //$action->output['thumbImg'] = '';
             //$action->output['img'] ='';
        },
            ],
            'upload' => [
                'class' => 'cliff363825\kindeditor\KindEditorUploadAction',
                'savePath' => '/web/upload',//图片保存的物理路径
                'basePath' => '@frontend',
                'baseUrl' => '@frontendUrl',
                'maxSize' => 2097152,//图片的限制
            ]
        ];
    }

    public function actionIndex(){
        /*$model = Article::find();
        $paginaton = new Pagination(['totalCount' => $model->count() , 'pageSize' => 10]);
        $result = $model->offset($paginaton->offset)->limit($paginaton->limit)->all();
        $categorys = Category::getCategory();
        print_r($categorys); print_r($result); exit();
        return $this->render('index',['result' => $result , 'pagination' => $paginaton,'categorys' => $categorys]);*/
        $result = (new \yii\db\Query())->select("a.id AS aid ,a.title,a.sort_order,a.status,c.name AS cname")->from("x_article a")->leftJoin("x_category c","a.cid = c.id")->all();
        //print_r($result);exit();
        $paginaton = new Pagination(['totalCount' => count($result) , 'pageSize' => 10]);
        //print_r($result); exit();
        return $this->render('index',['result' => $result , 'pagination' => $paginaton,]);
    }


    public function actionAdd(){
       /* $model = new Article();
        if(Yii::$app->request->isPost){
            exit();
        }*/
        $model = new Article();
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','add sucess');
            return $this->redirect(['index']);
        }else{
            Yii::$app->session->setFlash('failed' ,'add failed');
        }
        //print_r(Category::getAllCategorys());exit();
        return $this->render('add',['model' => $model ,'category' => Category::getAllCategorys()]);
    }

    public  function actionDelete(){
        $select = Yii::$app->request->post('selected');
        if(Article::deleteIn($select)){
            Yii::$app->session->setFlash('success','删除文章成功');
        }else{
            Yii::$app->session->setFlash('failed' ,'删除文章失败');
        }
        return $this->redirect(['index']);
    }

    public function actionEdit($id){
        $iid = (int)$id;
        $model = Article::findOne($iid);   //注意跟find（）不同
        $select = Yii::$app->request->post('tagsSelected');
        if($model){
            if( Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
                (new ArticleTags())->updateTag($iid,$select);
                Yii::$app->session->setFlash('success','编辑文章成功');
                return $this->redirect(['index']);
            }

            $tags = (new \yii\db\Query())->select('t.*,at.aid,at.tid')->from('x_tags t')->leftJoin('x_article_tags at','t.id = at.tid')->all();
            return $this->render('edit',['model' => $model,'category' => Category::getAllCategorys(),'tags'=>$tags]);
        }
        //return $this->render('index');    //注意这里是redirect。如果用render，index页面所需要的参数，这里无法提供，就会报错
        return $this->redirect(['index']);
    }

}