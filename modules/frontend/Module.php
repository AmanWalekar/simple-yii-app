<?php

namespace app\modules\frontend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\controllers\frontend';

    public function init()
    {
        parent::init();
        $this->layout = 'main';
    }
} 