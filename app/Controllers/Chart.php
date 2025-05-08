<?php

namespace App\Controllers;
use App\Models\CashflowModel;

class Chart extends BaseController
{
    public function cashflow()
    {
        $model = new CashflowModel();
        $data = $model->getCashflowByYear(2024);

        $bulanLabels = [];
        $pemasukan = [];
        $pengeluaran = [];

        foreach ($data as $row) {
            $bulanLabels[] = $row['bulan'];
            $pemasukan[] = (int) $row['pemasukan'];
            $pengeluaran[] = (int) $row['pengeluaran'];
        }

        return view('charts/cashflow', [
            'title' => 'Cash Flow Analysis',
            'bulanLabels' => $bulanLabels,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ]);
    }
}
