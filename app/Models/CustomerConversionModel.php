<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerConversionModel extends Model
{
    protected $table = 'customer_conversion';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
