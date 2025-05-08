<?php

namespace App\Models;

use CodeIgniter\Model;

class CashflowModel extends Model
{
    protected $table = 'cashflow_analysis';
    protected $allowedFields = ['bulan', 'pemasukan', 'pengeluaran', 'tahun'];

    public function getCashflowByYear($year)
    {
        return $this->where('tahun', $year)
            ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
            ->findAll();
    }
}
