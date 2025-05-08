<?php

namespace App\Controllers;

class Chart extends BaseController
{
    public function index()
    {
        // daftar chart yang nanti bisa kamu loop
        $charts = [
            "Cash Flow Analysis" => "chart/cashflow",
            "Revenue vs. Expenses" => "chart/revenue-vs-expenses",
            "Budget vs. Actual" => "chart/budgetVsActual",
            "Profit & Loss Overview" => "chart/profitLossOverview",
            "Financial Forecasting" => "chart/financial-forecasting",
            "Accounts Payable & Receivable" => "chart/payable-receivable",
            "General Ledger Summary" => "chart/general-ledger",
            "Expense Breakdown" => "chart/expense-breakdown",
            "Tax Compliance Status" => "chart/tax-compliance",
            "Audit & Compliance Reports" => "chart/audit-compliance",
            "Monthly Sales Performance" => "chart/monthly-sales",
            "Customer Conversion Rate" => "chart/customer-conversion",
            "Sales Pipeline & Forecasting" => "chart/sales-pipeline",

        ];

        return view('charts/index', [
            'title' => 'Daftar Chart',
            'charts' => $charts
        ]);
    }

    public function cashflow()
    {
        $model = new \App\Models\CashflowModel();
        $data = $model->getCashflowData(2024);
    
        $bulan = [];
        $pemasukan = [];
        $pengeluaran = [];
    
        foreach ($data as $row) {
            $bulan[] = $row['bulan'];
            $pemasukan[] = (int) $row['pemasukan'];
            $pengeluaran[] = (int) $row['pengeluaran'];
        }
    
        return view('charts/cashflow', [
            'title' => 'Cash Flow Analysis',
            'bulanLabels' => $bulan,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ]);
    }
    
    public function revenueVsExpenses()
    {
        $model = new \App\Models\RevenueModel();
        $data = $model->getRevenueData(2025);
    
        $bulanLabels = [];
        $revenue = [];
        $expenses = [];
    
        foreach ($data as $row) {
            $bulanLabels[] = $row['bulan'];
            $revenue[] = (int) $row['revenue'];
            $expenses[] = (int) $row['expenses'];
        }
    
        return view('charts/revenue_vs_expenses', [
            'title' => 'Revenue vs. Expenses',
            'bulanLabels' => $bulanLabels,
            'revenue' => $revenue,
            'expenses' => $expenses
        ]);
    }

    public function budgetVsActual()
    {
        $model = new \App\Models\BudgetModel();
        $data = $model->getBudgetData(2025);
    
        $bulanLabels = [];
        $budget = [];
        $actual = [];
    
        foreach ($data as $row) {
            $bulanLabels[] = $row['bulan'];
            $budget[] = (int) $row['budget'];
            $actual[] = (int) $row['actual'];
        }
    
        return view('charts/budget_vs_actual', [
            'title' => 'Budget vs. Actual',
            'bulanLabels' => $bulanLabels,
            'budget' => $budget,
            'actual' => $actual
        ]);
    }

    public function profitLossOverview()
    {
        $model = new \App\Models\ProfitLossModel();
        $data = $model->getProfitLossData(2024);
    
        $bulanLabels = [];
        $revenue = [];
        $expenses = [];
        $profit = [];
    
        foreach ($data as $row) {
            $bulanLabels[] = $row['bulan'];
            $revenue[] = (int) $row['revenue'];
            $expenses[] = (int) $row['expenses'];
            $profit[] = (int) $row['revenue'] - (int) $row['expenses'];
        }
    
        return view('charts/profit_loss', [
            'title' => 'Profit & Loss Overview',
            'bulanLabels' => $bulanLabels,
            'revenue' => $revenue,
            'expenses' => $expenses,
            'profit' => $profit
        ]);
    }

    public function financialForecasting()
    {
        $model = new \App\Models\FinancialForecastModel();
        $data = $model->getDataByYear(2024);
    
        $bulanLabels = [];
        $revenueActual = [];
        $expensesActual = [];
        $profitActual = [];
    
        foreach ($data as $row) {
            $bulanLabels[] = $row['bulan'];
            $revenueActual[] = (int) $row['revenue'];
            $expensesActual[] = (int) $row['expenses'];
            $profitActual[] = (int) $row['revenue'] - (int) $row['expenses'];
        }
    
        // Forecast 3 bulan ke depan
        $forecastMonths = ['Jan+1', 'Feb+1', 'Mar+1'];
        $lastRevenue = end($revenueActual);
        $lastExpenses = end($expensesActual);
    
        $revenueForecast = [
            round($lastRevenue * 1.05),
            round($lastRevenue * 1.10),
            round($lastRevenue * 1.15)
        ];
        $expensesForecast = [
            round($lastExpenses * 1.04),
            round($lastExpenses * 1.08),
            round($lastExpenses * 1.12)
        ];
        $profitForecast = [];
        foreach ($revenueForecast as $i => $rev) {
            $profitForecast[] = $rev - $expensesForecast[$i];
        }
    
        $allMonths = array_merge($bulanLabels, $forecastMonths);
    
        return view('charts/financial_forecast', [
            'title' => 'Financial Forecasting',
            'allMonths' => $allMonths,
            'revenueActual' => $revenueActual,
            'expensesActual' => $expensesActual,
            'profitActual' => $profitActual,
            'revenueForecast' => $revenueForecast,
            'expensesForecast' => $expensesForecast,
            'profitForecast' => $profitForecast
        ]);
    }

    public function payableReceivable()
{
    $model = new \App\Models\FinancialDataModel();
    $data = $model->getPayableReceivable(2025);

    $bulanLabels = [];
    $receivable = [];
    $payable = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $receivable[] = (int) $row['accounts_receivable'];
        $payable[] = (int) $row['accounts_payable'];
    }

    return view('charts/payable_receivable', [
        'title' => 'Accounts Payable & Receivable',
        'bulanLabels' => $bulanLabels,
        'receivable' => $receivable,
        'payable' => $payable
    ]);
}

public function generalLedger()
{
    $model = new \App\Models\GeneralLedgerModel();
    $data = $model->getSummaryByYear(2024);

    $bulanLabels = [];
    $revenue = [];
    $expenses = [];
    $assets = [];
    $liabilities = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $revenue[] = (int) $row['revenue'];
        $expenses[] = (int) $row['expenses'];
        $assets[] = (int) $row['assets'];
        $liabilities[] = (int) $row['liabilities'];
    }

    return view('charts/general_ledger', [
        'title' => 'General Ledger Summary',
        'bulanLabels' => $bulanLabels,
        'revenue' => $revenue,
        'expenses' => $expenses,
        'assets' => $assets,
        'liabilities' => $liabilities
    ]);
}

public function expenseBreakdown()
{
    $model = new \App\Models\ExpenseModel();
    $rawData = $model->getByYear(2024);

    $colors = ['blue', 'green', 'orange', 'red', 'gray'];
    $data = [];
    $i = 0;

    foreach ($rawData as $row) {
        $data[] = [
            'name'  => $row['kategori'],
            'y'     => (int) $row['jumlah'],
            'color' => $colors[$i % count($colors)]
        ];
        $i++;
    }

    return view('charts/expense_breakdown', [
        'title' => 'Expense Breakdown',
        'data'  => $data
    ]);
}

public function taxCompliance()
{
    $model = new \App\Models\TaxComplianceModel();
    $rawData = $model->getByYear(2024);

    $warna = [
        'Patuh' => 'green',
        'Terlambat' => 'yellow',
        'Tidak Patuh' => 'red'
    ];

    $data = [];
    foreach ($rawData as $row) {
        $data[] = [
            'name' => $row['kategori'],
            'y'    => (int) $row['jumlah'],
            'color' => $warna[$row['kategori']] ?? 'gray'
        ];
    }

    return view('charts/tax_compliance', [
        'title' => 'Tax Compliance Status',
        'data'  => $data
    ]);
}

public function auditCompliance()
{
    $model = new \App\Models\AuditComplianceModel();
    $data = $model->getByYear(2025);

    $bulanLabels = [];
    $audit = [];
    $compliance = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $audit[] = (int) $row['audit_dilakukan'];
        $compliance[] = (int) $row['tingkat_kepatuhan'];
    }

    return view('charts/audit_compliance', [
        'title' => 'Audit & Compliance Reports',
        'bulanLabels' => $bulanLabels,
        'audit' => $audit,
        'compliance' => $compliance
    ]);
}

public function monthlySales()
{
    $model = new \App\Models\SalesPerformanceModel();
    $data = $model->getByYear(2024);

    $bulanLabels = [];
    $target = [];
    $pencapaian = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $target[] = (int) $row['target'];
        $pencapaian[] = (int) $row['pencapaian'];
    }

    return view('charts/monthly_sales', [
        'title' => 'Monthly Sales Performance',
        'bulanLabels' => $bulanLabels,
        'target' => $target,
        'pencapaian' => $pencapaian
    ]);
}
public function customerConversion()
{
    $model = new \App\Models\CustomerConversionModel();
    $data = $model->getByYear(2024);

    $bulanLabels = [];
    $conversionRates = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $conversionRates[] = (float) $row['conversion_rate'];
    }

    return view('charts/customer_conversion', [
        'title' => 'Customer Conversion Rate',
        'bulanLabels' => $bulanLabels,
        'conversionRates' => $conversionRates
    ]);
}
public function salesPipeline()
{
    $model = new \App\Models\SalesPipelineModel();
    $data = $model->getByYear(2024);

    $bulanLabels = [];
    $leads = [];
    $qualified = [];
    $proposals = [];
    $deals = [];
    $forecast = [];

    foreach ($data as $row) {
        $bulanLabels[] = $row['bulan'];
        $leads[] = (int) $row['leads'];
        $qualified[] = (int) $row['qualified_leads'];
        $proposals[] = (int) $row['proposals'];
        $deals[] = (int) $row['deals_closed'];
        $forecast[] = (int) $row['forecast'];
    }

    return view('charts/sales_pipeline', [
        'title' => 'Sales Pipeline & Forecasting',
        'bulanLabels' => $bulanLabels,
        'leads' => $leads,
        'qualified' => $qualified,
        'proposals' => $proposals,
        'deals' => $deals,
        'forecast' => $forecast
    ]);
}


}
