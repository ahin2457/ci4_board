<?php

namespace App\Models;

use CodeIgniter\Model;

class TestM extends Model
{
    protected $DBGroup          ='default';
    protected $table            = 'board';
    protected $primaryKey       = 'bid';
    protected $useAutoIncrement = true; //자동증가 설정
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userid','subject','content','status','parent_id'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'regdate';
    protected $updatedField  = 'modifydate';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
