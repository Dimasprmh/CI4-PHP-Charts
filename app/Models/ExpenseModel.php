<?php

namespace App\Models;
use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table = 'expense_breakdown';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)->findAll();
    }
}
