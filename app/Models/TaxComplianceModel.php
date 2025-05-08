<?php

namespace App\Models;
use CodeIgniter\Model;

class TaxComplianceModel extends Model
{
    protected $table = 'tax_compliance';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)->findAll();
    }
}
