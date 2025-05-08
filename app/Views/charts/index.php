<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 style="text-align: center;">Daftar Chart</h2>

<div class="chart-list">
    <?php
    $charts = [
        "Cash Flow Analysis" => "chart/cashflow",
        "Revenue vs. Expenses" => "chart/revenue-vs-expenses",
        "Budget vs. Actual" => "chart/budget-vs-actual",
        "Profit & Loss Overview" => "chart/profit-loss-overview",
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
        "Purchase Order Tracking" => "chart/purchase-order",
        "Cost Savings & Spend Analysis" => "chart/cost-saving",
        "Lead Time & Delivery Status" => "chart/lead-time",
        "Inventory Purchase Trends" => "chart/inventory-purchase",
        "Machine Utilization Rate" => "chart/machine-utilization",
        "Production Output vs. Target" => "chart/production-outputvstarget",
        "Downtime & Maintenance Tracking" => "chart/downtime-maintenance",
        "Quality Control Metrics" => "chart/quality-control",
        "Work Order Management" => "chart/work-order",
        "Demand Forecasting & Planning" => "chart/demand-forecasting",
        "Inventory Turnover Ratio" => "chart/inventory-turnover",
        "Work-In-Progress (WIP) Tracking" => "chart/work-in-progress",
        "Supply & Demand Alignment" => "chart/supply-demand-alignment",
        "Stock Reorder Point" => "chart/stock-reorder-point",
        "Delivery Performance & Status" => "chart/delivery-performance",
        "Freight & Transportation Costs" => "chart/freight-costs",
        "Warehouse Capacity Utilization" => "chart/warehouse-utilization",
        "Order Fulfillment Cycle Time" => "chart/order-cycle-time",
        "Supplier Lead Time Analysis" => "chart/supplier-lead-time"
    ];

    foreach ($charts as $chartName => $chartLink) {
        echo "<a href='" . base_url($chartLink) . "' class='chart-item'>{$chartName}</a>";
    }
    ?>
</div>

<?= $this->endSection() ?>
