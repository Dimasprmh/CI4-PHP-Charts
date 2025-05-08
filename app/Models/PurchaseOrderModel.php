<?php

namespace App\Models;
use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_order_tracking';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec')", '', false)
                    ->findAll();
    }
}
