<?php

    use app\modules\news\models\news;
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\helpers\Url;

    /* @var $this yii\web\View */
    /* @var $searchModel app\modules\news\models\news */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Новости';
    $this->params['breadcrumbs'][] = 'Пример с GridView';
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader' => true,
        'showFooter' => false,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            'name',
            'description',
            'content',
            [
                'attribute' => 'created_at',
                'label' => 'Создано',
                'format' => 'datetime',
                'headerOptions' => ['width' => '200'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'HH:mm:ss dd.MM.YYYY'],
                'options' => ['width' => '200']
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-screenshot"></span>',
                            $url);
                    },
                    'link' => function ($url, $model, $key) {
                        return Html::a('Action', $url);
                    },
                ],
            ],

            'newsImagePath:image',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img(Url::toRoute($data->news_image), [
                        'alt' => 'yii2 - картинка в gridview',
                        'style' => 'width:15px;'
                    ]);
                },
            ],
            [
                'label' => 'Ссылка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                        'Перейти',
                        'newsitem?id=' . $data->id,
                        [
                            'title' => 'открыть',
                            'target' => '_blank'
                        ]
                    );
                }
            ],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
    ]);
    ?>

</div>