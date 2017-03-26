<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\ImageUpload;
use Yii;
use app\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
            'pagination' => [
                'pageSize' => 4
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {

            $tags = Yii::$app->request->post('tags');
            $model->saveTags($tags);

            $model->user_id = Yii::$app->user->id;

            $category = Category::findOne(Yii::$app->request->post('category'));

            $model->saveCategory($category);

            $this->actionSetImage($model, 'create');

            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $tags = Yii::$app->request->post('tags');
            $model->saveTags($tags);

            $category = Category::findOne(Yii::$app->request->post('category'));

            $model->saveCategory($category);

            $this->actionSetImage($model, 'update');

            $model->save();

            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Загрузка изображений на сервер и в базу
     * @param $model <p>Экземпляр модели статьи </p>
     * @param $mode <p>режим создания или замены изображения</p>
     */
    public function actionSetImage($model, $mode)
    {
        //создаём экземпляр модели загрузки изображений
        $art_image = new ImageUpload();

        //Загружаем изображение на сервер
        $art_image->image = UploadedFile::getInstance($model, 'image');

        //в зависимости от режима работы сохраняем новое или заменяем существующее изображение
        if ($mode == 'create') {

            $name = $art_image->upload();
            $model->saveImage($name);
            
        } else {

            $name = $art_image->upload($model->image);

            if ($name) {

                $model->saveImage($name);
            }
        }
    }
}
