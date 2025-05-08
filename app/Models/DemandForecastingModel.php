<?php

namespace App\Models;

use CodeIgniter\Model;

class DemandForecastingModel extends Model
{
    protected $table = 'demand_forecasting';
    protected $allowedFields = ['tahun', 'bulan', 'actual_demand', 'forecasted_demand', 'planned_production'];

    public function getByYear($tahun = 2024)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false)
                    ->findAll();
    }
}
