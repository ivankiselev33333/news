<?php
/**
 * Created by PhpStorm.
 * User: ivan kiselev
 * Date: 01.05.2018
 * Time: 9:24
 */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ConfigController extends Controller{

    public function actionIndex()
    {






        return $this->render('index');
    }


}