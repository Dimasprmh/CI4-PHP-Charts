<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryTurnoverModel extends Model
{
    protected $table = 'inventory_turnover';
    protected $allowedFields = ['bulan', 'turnover_ratio'];

    public function getDataByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
