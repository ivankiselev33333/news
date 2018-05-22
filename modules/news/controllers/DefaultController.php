<?php

    namespace app\modules\news\controllers;

    use yii\web\Controller;
    use Yii;
    use app\modules\news\models\news;
    use app\modules\news\models\newsSearch;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;
    use yii\web\UploadedFile;

    class DefaultController extends Controller
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

        public function actionIndex()
        {
            $searchModel = new newsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


        public function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        protected function findModel($id)
        {
            if (($model = news::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

        public function actionNewsitem($id)
        {
            if ($id === 'all') {
                $searchModel = new newsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('allnews', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);

            } else {
                return $this->render('item', [
                    'model' => $this->findModel($id),
                ]);
            }
        }

        public function actionCreate()
        {
            $model = new news();

            if ($model->load(Yii::$app->request->post())) {

                $uploadedFile = UploadedFile::getInstance($model, 'tmpImage');
                if ($uploadedFile !== null) {
                    $path = Yii::$app->params['uploadPath']
                        . Yii::$app->security->generateRandomString()
                        . '.' . $uploadedFile->extension;
                    $model->news_image = $path;
                    if ($model->validate()) {
                        $uploadedFile->saveAs(mb_substr($model->news_image, 1));
                    }
                }
                if ($model->save()) {
                    if ($uploadedFile !== null) {
                    }
                    return $this->redirect(['index']);
                } else {

                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        public function actionUpdate($id)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {

                $uploadedFile = UploadedFile::getInstance($model, 'tmpImage');
                if ($uploadedFile) {
                    $path = Yii::$app->params['uploadPath']
                        . Yii::$app->security->generateRandomString()
                        . '.' . $uploadedFile->extension;
                    $model->news_image = $path;
                    if ($model->validate()) {
                        $uploadedFile->saveAs(mb_substr($model->news_image, 1));
                    }
                }
                if ($model->save()) {
                    return $this->redirect(['index']);
                } else {

                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

        public function actionDelete($id)
        {
            $file = mb_substr($this->findModel($id)->news_image, 1);
            if ($this->findModel($id)->delete()) {
                unlink($file);
            }

            return $this->redirect(['index']);
        }
    }