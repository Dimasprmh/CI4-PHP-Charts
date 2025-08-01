<?php

namespace App\Models;
use CodeIgniter\Model;

class CashflowModel extends Model
{
    protected $table = 'cashflow_analysis';

    public function getCashflowData($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
