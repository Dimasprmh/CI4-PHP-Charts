<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierLeadTimeModel extends Model
{
    protected $table = 'supplier_lead_time';
    protected $allowedFields = ['nama_supplier', 'lead_time', 'tahun'];

    public function getDataByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy('nama_supplier', 'ASC')
                    ->findAll();
    }
}
