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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            [
                'attribute' => 'created_at',
                'label' => 'Создано',
                'format' => 'datetime',
                'headerOptions' => ['width' => '200'],
            ],
            'content',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'HH:mm:ss dd.MM.YYYY'],
                'options' => ['width' => '200']
            ],
            'newsImagePath:image',
        ],
    ]) ?>

</div>