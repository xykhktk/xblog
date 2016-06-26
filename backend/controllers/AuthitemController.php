<?php

namespace backend\controllers;

use Yii;
use common\models\AuthItemModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * AuthitemController implements the CRUD actions for AuthItemModel model.
 */
class AuthitemController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItemModel models.
     * @return mixed
     */
    public function actionIndex()
    {
       /* $dataProvider = new ActiveDataProvider([
            'query' => AuthItemModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);*/
        $model = new AuthItemModel();
        //分页
        $curPage = Yii:: $app-> request->get( 'page',1);
        $pageSize = 1;
        //搜索
        $type = Yii:: $app-> request->get( 'type', '');
        $value = Yii:: $app-> request->get( 'value', '');
        $search = ($type&&$value)?[ 'like',$type,$value]: '';
        //查询语句
        $query = $model->find()->orderBy( 'created_at DESC');
        $data = $model->getPages($query,$curPage,$pageSize,$search);
        $pages = new Pagination([ 'totalCount' =>$data[ 'count'], 'pageSize' => $pageSize]);

        return $this->render('index',['pages'=>$pages,'data'=>$data]);

    }

    /**
     * Displays a single AuthItemModel model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItemModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItemModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItemModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItemModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItemModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItemModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItemModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
