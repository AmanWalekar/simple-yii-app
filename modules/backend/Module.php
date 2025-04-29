<?php

namespace app\modules\backend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\controllers\backend';

    public function init()
    {
        parent::init();
        $this->layout = 'main';
    }
} 