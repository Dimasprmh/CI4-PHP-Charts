<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfitLossModel extends Model
{
    protected $table = 'profit_loss';

    public function getProfitLossData($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
