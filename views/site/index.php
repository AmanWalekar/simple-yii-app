<?php

use yii\helpers\Html;

$this->title = 'My Yii2 Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Welcome to Yii2!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
        <p>
            <?= Html::a('View Posts', ['/post/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</div> 