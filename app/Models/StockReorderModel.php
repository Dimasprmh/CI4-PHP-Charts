<?php

namespace App\Models;
use CodeIgniter\Model;

class StockReorderModel extends Model
{
    protected $table = 'stock_reorder';

    public function getDataByMonth($bulan, $tahun)
    {
        return $this->where('bulan', $bulan)
                    ->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
