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
            "Top Selling Products/Services" => "chart/top-selling",
            "Sales Rep Performance" => "chart/sales-rep",
            "Supplier Performance Analysis" => "chart/supplier-performance",
            "Purchase Order Tracking" => "chart/purchase-order-tracking",
            "Cost Savings & Spend Analysis" => "chart/cost-saving",
            "Lead Time & Delivery Status" => "chart/lead-time",
            "Inventory Purchase Trends" => "chart/inventory-purchase",
            "Machine Utilization Rate" => "chart/machine-utilization",
            "Production Output vs Target" => "chart/production-outputvstarget",
            "Downtime & Maintenance Tracking" => "chart/downtime-maintenance",
            "Quality Control Metrics" => "chart/quality-control",
            "Work Order Management" => "chart/work-order",
            "Demand Forecasting & Planning" => "chart/demand-forecasting",
            "Inventory Turnover Ratio" => "chart/inventory-turnover",
            "Work-In-Progress (WIP) Tracking" => "chart/wip-tracking",
            "Supply & Demand Alignment" => "chart/supply-demand-alignment",
            "Stock Reorder Point" => "chart/stock-reorder-point",
            "Delivery Performance & Status" => "chart/delivery-performance",
            "Freight & Transportation Costs" => "chart/freight-costs",
            "Warehouse Capacity Utilization" => "chart/warehouse-utilization",
            "Order Fulfillment Cycle Time" => "chart/order-cycle-time",
            "Supplier Lead Time Analysis" => "chart/supplier-lead-time"
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
public function topSelling()
{
    $model = new \App\Models\TopSellingModel();
    $data = $model->getByYear(2024);

    $produk = [];
    $jumlah = [];

    foreach ($data as $row) {
        $produk[] = $row['nama_produk'];
        $jumlah[] = (int) $row['jumlah_terjual'];
    }

    return view('charts/top_selling', [
        'title' => 'Top Selling Products/Services',
        'produk' => $produk,
        'jumlah' => $jumlah
    ]);
}
public function salesRep()
{
    $model = new \App\Models\SalesRepModel();
    $data = $model->getByYear(2024);

    $namaSales = [];
    $totalSales = [];

    foreach ($data as $row) {
        $namaSales[] = $row['nama_sales'];
        $totalSales[] = (int)$row['total_penjualan'];
    }

    return view('charts/sales_rep', [
        'title' => 'Sales Rep Performance',
        'namaSales' => $namaSales,
        'totalSales' => $totalSales
    ]);
}
public function supplierPerformance()
{
    $model = new \App\Models\SupplierPerformanceModel();
    $data = $model->getByYear(2024);

    $suppliers = [];
    $onTime = [];
    $quality = [];

    foreach ($data as $row) {
        $suppliers[] = $row['nama_supplier'];
        $onTime[] = (float) $row['on_time_delivery'];
        $quality[] = (float) $row['quality_rating'];
    }

    return view('charts/supplier_performance', [
        'title' => 'Supplier Performance Analysis',
        'suppliers' => $suppliers,
        'onTime' => $onTime,
        'quality' => $quality
    ]);
}
public function purchaseOrderTracking()
{
    $model = new \App\Models\PurchaseOrderModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $created = [];
    $completed = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $created[] = (int)$row['orders_created'];
        $completed[] = (int)$row['orders_completed'];
    }

    return view('charts/purchase_order_tracking', [
        'title' => 'Purchase Order Tracking',
        'bulan' => $bulan,
        'created' => $created,
        'completed' => $completed
    ]);
}
public function costSaving()
{
    $model = new \App\Models\CostSavingModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $savings = [];
    $spend = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $savings[] = (int)$row['cost_saving'];
        $spend[] = (int)$row['total_spend'];
    }

    return view('charts/cost_saving', [
        'title' => 'Cost Savings & Spend Analysis',
        'bulan' => $bulan,
        'savings' => $savings,
        'spend' => $spend
    ]);
}
public function leadTime()
{
    $model = new \App\Models\LeadTimeModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $lead_time = [];
    $on_time = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $lead_time[] = (int)$row['lead_time'];
        $on_time[] = (float)$row['on_time_delivery'];
    }

    return view('charts/lead_time', [
        'title' => 'Lead Time & Delivery Status',
        'bulan' => $bulan,
        'lead_time' => $lead_time,
        'on_time' => $on_time
    ]);
}
public function inventoryPurchase()
{
    $model = new \App\Models\InventoryPurchaseModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $purchased = [];
    $used = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $purchased[] = (int)$row['purchased'];
        $used[] = (int)$row['used'];
    }

    return view('charts/inventory_purchase', [
        'title' => 'Inventory Purchase Trends',
        'bulan' => $bulan,
        'purchased' => $purchased,
        'used' => $used
    ]);
}
public function machineUtilization()
{
    $model = new \App\Models\MachineUtilizationModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $utilization = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $utilization[] = (float)$row['utilization_rate'];
    }

    return view('charts/machine_utilization', [
        'title' => 'Machine Utilization Rate 2024',
        'bulan' => $bulan,
        'utilization' => $utilization
    ]);
}
public function productionOutputVsTarget()
{
    $model = new \App\Models\ProductionOutputModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $target = [];
    $actual = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $target[] = (int)$row['target'];
        $actual[] = (int)$row['actual_output'];
    }

    return view('charts/production_output', [
        'title' => 'Production Output vs Target',
        'bulan' => $bulan,
        'target' => $target,
        'actual' => $actual
    ]);
}
public function downtimeMaintenance()
{
    $model = new \App\Models\DowntimeMaintenanceModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $downtime = [];
    $maintenance = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $downtime[] = (int)$row['downtime_jam'];
        $maintenance[] = (int)$row['jumlah_maintenance'];
    }

    return view('charts/downtime_maintenance', [
        'title' => 'Downtime & Maintenance Tracking',
        'bulan' => $bulan,
        'downtime' => $downtime,
        'maintenance' => $maintenance
    ]);
}
public function qualityControl()
{
    $model = new \App\Models\QualityControlModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $defect = [];
    $yield = [];
    $rework = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $defect[] = (float) $row['defect_rate'];
        $yield[] = (float) $row['yield_percentage'];
        $rework[] = (int) $row['rework_count'];
    }

    return view('charts/quality_control', [
        'title' => 'Quality Control Metrics',
        'bulan' => $bulan,
        'defect' => $defect,
        'yield' => $yield,
        'rework' => $rework
    ]);
}
public function workOrder()
{
    $model = new \App\Models\WorkOrderModel();
    $data = $model->getDataByYear(2024);

    $bulan = [];
    $completed = [];
    $in_progress = [];
    $pending = [];
    $cancelled = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $completed[] = (int)$row['completed'];
        $in_progress[] = (int)$row['in_progress'];
        $pending[] = (int)$row['pending'];
        $cancelled[] = (int)$row['cancelled'];
    }

    return view('charts/work_order', [
        'bulan' => $bulan,
        'completed' => $completed,
        'in_progress' => $in_progress,
        'pending' => $pending,
        'cancelled' => $cancelled,
    ]);
}
public function demandForecasting()
{
    $model = new \App\Models\DemandForecastingModel();
    $dataRaw = $model->getByYear(2024);

    $bulan = [];
    $actual = [];
    $forecast = [];
    $planned = [];

    foreach ($dataRaw as $row) {
        $bulan[] = $row['bulan'];
        $actual[] = (int)$row['actual_demand'];
        $forecast[] = (int)$row['forecasted_demand'];
        $planned[] = (int)$row['planned_production'];
    }

    return view('charts/demand_forecasting', [
        'title' => 'Demand Forecasting & Planning',
        'bulan' => $bulan,
        'actual' => $actual,
        'forecast' => $forecast,
        'planned' => $planned
    ]);
}
public function inventoryTurnover()
{
    $model = new \App\Models\InventoryTurnoverModel();
    $data = $model->getDataByYear(2024);

    $bulan = [];
    $ratio = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $ratio[] = (float) $row['turnover_ratio'];
    }

    return view('charts/inventory_turnover', [
        'title' => 'Inventory Turnover Ratio',
        'bulan' => $bulan,
        'ratio' => $ratio
    ]);
}
public function wipTracking()
{
    $model = new \App\Models\WipModel();
    $data = $model->getWipByYear(2024);

    $bulan = [];
    $wip = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $wip[] = (int)$row['jumlah_wip'];
    }

    return view('charts/wip_tracking', [
        'title' => 'WIP Tracking',
        'bulan' => $bulan,
        'wip' => $wip
    ]);
}
public function supplyDemandAlignment()
{
    $model = new \App\Models\SupplyDemandModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $supply = [];
    $demand = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $supply[] = (int) $row['supply'];
        $demand[] = (int) $row['demand'];
    }

    return view('charts/supply_demand', [
        'title' => 'Supply & Demand Alignment',
        'bulan' => $bulan,
        'supply' => $supply,
        'demand' => $demand
    ]);
}
public function stockReorderPoint()
{
    $bulan = 'Apr';
    $tahun = 2024;

    $model = new \App\Models\StockReorderModel();
    $dataRaw = $model->getDataByMonth($bulan, $tahun);

    $barang = [];
    $stock = [];
    $rop = [];
    $minstock = [];

    foreach ($dataRaw as $row) {
        $barang[] = $row['nama_barang'];
        $stock[] = (int) $row['stock_saat_ini'];
        $rop[] = (int) $row['reorder_point'];
        $minstock[] = (int) $row['minimum_stock'];
    }

    return view('charts/stock_reorder_point', [
        'title' => 'Stock Reorder Point',
        'bulan' => $bulan,
        'tahun' => $tahun,
        'barang' => $barang,
        'stock' => $stock,
        'rop' => $rop,
        'minstock' => $minstock
    ]);
}
public function deliveryPerformance()
{
    $model = new \App\Models\DeliveryPerformanceModel();
    $data = $model->getDataByYear(2024);

    $bulan = [];
    $onTime = [];
    $late = [];
    $pending = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $onTime[] = (int) $row['on_time'];
        $late[] = (int) $row['late'];
        $pending[] = (int) $row['pending'];
    }

    return view('charts/delivery_performance', [
        'title' => 'Delivery Performance & Status',
        'tahun' => 2024,
        'bulan' => $bulan,
        'onTime' => $onTime,
        'late' => $late,
        'pending' => $pending
    ]);
}
public function freightCosts()
{
    $model = new \App\Models\FreightCostModel();
    $data = $model->getByYear(2024);

    $bulan = [];
    $biaya = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $biaya[] = (int)$row['biaya_pengiriman'];
    }

    return view('charts/freight_costs', [
        'title' => 'Freight & Transportation Costs',
        'bulan' => $bulan,
        'biaya' => $biaya
    ]);
}
public function warehouseUtilization()
{
    $db = \Config\Database::connect();
    $builder = $db->table('warehouse_capacity');
    $builder->select('bulan, kapasitas_terpakai');
    $builder->where('tahun', 2024); // atau gunakan dynamic jika diperlukan
    $builder->orderBy("FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')", '', false);

    $query = $builder->get();

    $bulan = [];
    $kapasitas = [];

    foreach ($query->getResult() as $row) {
        $bulan[] = $row->bulan;
        $kapasitas[] = (int)$row->kapasitas_terpakai;
    }

    return view('charts/warehouse_utilization', [
        'bulan' => $bulan,
        'kapasitas' => $kapasitas
    ]);
}
public function orderCycleTime()
{
    $model = new \App\Models\OrderCycleTimeModel();
    $data = $model->getDataByYear(2024);

    $bulan = [];
    $cycle_time = [];

    foreach ($data as $row) {
        $bulan[] = $row['bulan'];
        $cycle_time[] = (float) $row['cycle_time'];
    }

    return view('charts/order_cycle_time', [
        'bulan' => $bulan,
        'cycle_time' => $cycle_time
    ]);
}
public function supplierLeadTime()
{
    $model = new \App\Models\SupplierLeadTimeModel();
    $tahun = 2024;
    $result = $model->getDataByYear($tahun);

    $suppliers = [];
    $leadTimes = [];

    foreach ($result as $row) {
        $suppliers[] = $row['nama_supplier'];
        $leadTimes[] = (float) $row['lead_time'];
    }

    return view('charts/supplier_lead_time', [
        'title' => 'Supplier Lead Time Analysis',
        'suppliers' => $suppliers,
        'leadTimes' => $leadTimes
    ]);
}


}
