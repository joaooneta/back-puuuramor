<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestacaoContasModel extends Model
{
    protected $table            = 'prestacoes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['img'];

    // Se quiser timestamps automáticos (created_at, updated_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
