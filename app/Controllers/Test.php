<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestM;
use CodeIgniter\HTTP\ResponseInterface;
use PHPMailer\PHPMailer\PHPMailer;

class Test extends BaseController
{
    public function getIndex()
    {
        echo __FUNCTION__;
        $model = new TestM();
        $row = $model->builder()->where('bid >',200)->get();

        dd($row->getResultArray());
        view('/board/test_v'.['data'=>$row->getResultArray()]);
    }

    public function getTest2()
    {
        //autoroute -> 호출 메소드 +메소드

        echo __FUNCTION__;
        $this->getIndex();
    }

    public function postTest2()
    {
        echo __FUNCTION__;
    }
}
