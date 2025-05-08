<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderCycleTimeModel extends Model
{
    protected $table = 'order_fulfillment';
    protected $allowedFields = ['bulan', 'tahun', 'cycle_time'];

    public function getDataByYear($tahun)
    {
        return $this->where('tahun', $tahun)
            ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
            ->findAll();
    }
}
