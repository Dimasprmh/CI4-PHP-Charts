<?php

namespace App\Models;
use CodeIgniter\Model;

class LeadTimeModel extends Model
{
    protected $table = 'lead_time_delivery';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
