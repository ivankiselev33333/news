<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model app\modules\news\models\news */

    $this->title = 'Изменить новость: ' . ' ' . $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'новость', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>