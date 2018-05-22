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
    <?php ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader' => true,
        'showFooter' => false,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'HH:mm:ss dd.MM.YYYY'],
                'options' => ['width' => '100']
            ],
            'description',

            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img(Url::toRoute($data->news_image), [
                        'alt' => 'yii2 - картинка в gridview',
                        'style' => 'width:250px;'
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