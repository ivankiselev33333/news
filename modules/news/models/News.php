<?php

    namespace app\modules\news\models;

    use Yii;
    use yii\behaviors\TimestampBehavior;
    use yii\db\ActiveRecord;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Url;

    /**
     * This is the model class for table "news".
     *
     * @property integer $id
     * @property string $name
     * @property string $description
     * @property string $content
     * @property string $url
     * @property string $news_image
     * @property integer $created_at
     * @property integer $updated_at
     */
    class news extends ActiveRecord
    {
        const DEFAULT_URL = 'http://YII2';
        public $tmpImage;
        public $newsImagePath;

        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'news';
        }

        public static function getDB()
        {
            return \Yii::$app->getModule('news')->db;
        }

        public static function getNewsList()
        {
            $news = news::find()->select(['id', 'name'])->all();
            return ArrayHelper::map($news, 'id', 'name');;
        }

        /**
         * @inheritdoc
         * @return newsQuery the active query used by this AR class.
         */
        public static function find()
        {
            return new newsQuery(get_called_class());
        }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['name'], 'required'],
                [['description'], 'required'],
                [['content'], 'required'],
                [['name', 'url'], 'string', 'max' => 45],
                [
                    ['news_image'],
                    'file',
                    'skipOnEmpty' => true,
                    'extensions' => 'png, jpg'
                ],
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'content' => 'контент',
                'name' => 'Название',
                'description' => 'заголовок',
                'url' => 'Ссылка',
                'news_image' => 'Картинка',
                'newsImagePath' => 'Картинка',
                '$tmpImage' => 'Картинка',
                'created_at' => 'Создано',
                'updated_at' => 'Изменено',
            ];
        }

        public function behaviors()
        {
            return [
                TimestampBehavior::className(),
            ];
        }

        public function getImagePath()
        {
            return Url::to(Yii::$app->params['uploadPath'] . $this->news_image, true);
        }


        public function afterFind()
        {
            if (mb_strlen($this->news_image) > 0) {
                $this->newsImagePath = Url::toRoute($this->news_image);
            }
        }
    }