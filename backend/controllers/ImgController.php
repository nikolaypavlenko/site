<?php

namespace backend\controllers;

use Yii;
use common\models\Img;
use backend\models\ImgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;




/**
 * ImgController implements the CRUD actions for Img model.
 */
class ImgController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Img models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Img model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Img model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id = $_GET['id']; //получение id продукта, отправленного с бэкенд/продакт/индекс
         $images = Img::find()->where(['product_id' => $id])->all(); // выбор всех фото по продукту 
         $model = new Img();
         $foto = time(); // вводим переменную, которую закодирует мд5 при сохранении

        //сохранение загружаемого файла
        if ($model->load(Yii::$app->request->post()) ) {
                 $model->product_id = $id;
                 $model->file = UploadedFile::getInstance($model, 'file');
                 if($model->file){
                     $model->file->saveAs(Yii::getAlias('@frontend/web/images/') . md5($foto) . '.' . $model->file->extension);
                     $model->image = '/frontend/web/images/' . md5($foto) . '.' . $model->file->extension;
                }
        $model->save(false); //что-бы повторно не валидировалось, иначе присваивается $model->image = "i"
         return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'images' => $images
            ]);
        }
    }
    

    /**
     * Updates an existing Img model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        $foto = time(); // вводим переменную, которую закодирует мд5 при сохранении
        $images = Img::find()->where(['product_id' => $model->product_id])->all();
        $del = $model->image; // file for delete
         $foto = time(); // вводим переменную, которую закодирует мд5 при сохранении
        $images = Img::find()->where(['product_id' => $model->product_id])->all();
         $del = $model->image; // file for delete
        
        if ($model->load(Yii::$app->request->post()) ) {
                $model->file = UploadedFile::getInstance($model, 'file');
                 if($model->file){
                     $model->file->saveAs(Yii::getAlias('@frontend/web/images/') . md5($foto) . '.' . $model->file->extension);
                     $model->image = '/frontend/web/images/' . md5($foto) . '.' . $model->file->extension;
                }
            $model->save(false);
             //удаление файла с фото на сайте
              if($model->save(false)) {
                    if (is_file($_SERVER['DOCUMENT_ROOT'] . $del)) {
                         unlink($_SERVER['DOCUMENT_ROOT'] . $del); //указываем полный путь к файлу на сервере
                    } else {
                         throw new NotFoundHttpException('The requested page does not exist.');
                    }

                     unlink($_SERVER['DOCUMENT_ROOT'] . $del); //указываем полный путь к файлу на сервере
             }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'images' => $images,
            ]);
        }
    }

    /**
     * Deletes an existing Img model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);        
        $del = $model->image; // file for delete
        $this->findModel($id)->delete();
        if (is_file($_SERVER['DOCUMENT_ROOT'] . $del)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $del); //указываем полный путь к файлу на сервере
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
         $model = $this->findModel($id);        
         $del = $model->image; // file for delete
         $this->findModel($id)->delete();
         unlink($_SERVER['DOCUMENT_ROOT'] . $del); //указываем полный путь к файлу на сервере

        return $this->redirect(['index']);
    }

    /**
     * Finds the Img model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Img the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Img::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
