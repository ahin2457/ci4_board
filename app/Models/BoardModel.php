<?php

namespace App\Models;
use CodeIgniter\Model;

class BoardModel extends Model
{
    protected $table = 'board'; // 사용하는 테이블
    protected $returnType = 'object'; // 이 값이 없으면 기본이 array 가 됨

    // 사용할 컬럼지정, 전부 다
    protected $allowedFields = [
        'bid'
        ,'userid'
        ,'subject'
        ,'content'
        ,'regdate'
        ,'modifydate'
        ,'status'
        ,'parent_id'
    ];

}