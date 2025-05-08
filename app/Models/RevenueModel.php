<?php

namespace App\Models;
use CodeIgniter\Model;

class RevenueModel extends Model
{
    protected $table = 'revenue_expenses';

    public function getRevenueData($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
