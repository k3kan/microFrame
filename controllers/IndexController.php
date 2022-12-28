<?php

namespace controllers;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
}