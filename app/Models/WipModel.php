<?php

namespace App\Models;

use CodeIgniter\Model;

class WipModel extends Model
{
    protected $table = 'wip_tracking';

    public function getWipByYear($tahun)
    {
        return $this->where('tahun', $tahun)
            ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
            ->findAll();
    }
}
