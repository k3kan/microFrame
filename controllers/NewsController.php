<?php

namespace controllers;

use db\DB;

class NewsController extends BaseController
{
    /**
     * Example
     */
    public function actionView($category, $id)
    {
        $query = DB::connection()
            ->prepare('SELECT * FROM news WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        echo $this->render('view' ,[
            'data' => $data
        ]);
    }
}