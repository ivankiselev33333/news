<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model app\modules\news\models\news */

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Новость', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'created_at',
                'label' => 'Создано',
                'format' => 'datetime',
                'headerOptions' => ['width' => '200'],
            ],
            'description',
            'newsImagePath:image',

            'content',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'HH:mm:ss dd.MM.YYYY'],
                'options' => ['width' => '200']
            ],

        ],
    ]) ?>

</div>