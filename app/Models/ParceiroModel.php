<?php

namespace App\Models;

use CodeIgniter\Model;

class ParceiroModel extends Model
{
    protected $table            = 'parceiros';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'nome',
        'link',
        'logo',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
