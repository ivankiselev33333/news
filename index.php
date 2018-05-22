<?php

// comment out the following two lines when deployed to production
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');

# Загружает различные вспомогательные классы из папки вендор
    require __DIR__ . '/vendor/autoload.php';

# подключаем базовый класс самого yii2 Что делает ХЗN1
    require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

# объявляется конфигурация и параметры yii2 приложения.
    $config = require __DIR__ . '/config/web.php';

# Создается приложения и передается в приложения параметры объявленной конфигурации и
# запускается метод ран который хрен знает что делает
# Ранее был подключен коммандой реквайр на 11 строке

    (new yii\web\Application($config))->run();

