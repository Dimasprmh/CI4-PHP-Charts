<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('login', 'Auth::login');
 $routes->post('login', 'Auth::loginPost');
 $routes->get('logout', 'Auth::logout');
 $routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);
// Default route (beranda / dashboard)
//$routes->get('/', 'Dashboard::index');

// Route untuk halaman daftar semua chart
$routes->get('chart', 'Chart::index'); 

// Semua chart spesifik dikelompokkan di sini
$routes->group('chart', function($routes) {
    $routes->get('cashflow', 'Chart::cashflow');
    $routes->get('payable-receivable', 'Chart::payableReceivable');
    $routes->get('revenue-vs-expenses', 'Chart::revenueVsExpenses');
    $routes->get('budget-vs-actual', 'Chart::budgetVsActual');
    $routes->get('profit-loss-overview', 'Chart::profitLossOverview');
    $routes->get('financial-forecasting', 'Chart::financialForecasting');
    $routes->get('general-ledger', 'Chart::generalLedger');
    $routes->get('expense-breakdown', 'Chart::expenseBreakdown');
    $routes->get('tax-compliance', 'Chart::taxCompliance');
    $routes->get('audit-compliance', 'Chart::auditCompliance');
    $routes->get('monthly-sales', 'Chart::monthlySales');
    $routes->get('customer-conversion', 'Chart::customerConversion');
    $routes->get('sales-pipeline', 'Chart::salesPipeline');
    $routes->get('top-selling', 'Chart::topSelling');
    $routes->get('sales-rep', 'Chart::salesRep');
    $routes->get('supplier-performance', 'Chart::supplierPerformance');
    $routes->get('purchase-order-tracking', 'Chart::purchaseOrderTracking');
    $routes->get('cost-saving', 'Chart::costSaving');
    $routes->get('lead-time', 'Chart::leadTime');
    $routes->get('inventory-purchase', 'Chart::inventoryPurchase');
    $routes->get('machine-utilization', 'Chart::machineUtilization');
    $routes->get('production-outputvstarget', 'Chart::productionOutputVsTarget');
    $routes->get('downtime-maintenance', 'Chart::downtimeMaintenance');
    $routes->get('quality-control', 'Chart::qualityControl');
    $routes->get('work-order', 'Chart::workOrder');
    $routes->get('demand-forecasting', 'Chart::demandForecasting');
    $routes->get('inventory-turnover', 'Chart::inventoryTurnover');
    $routes->get('wip-tracking', 'Chart::wipTracking');
    $routes->get('supply-demand-alignment', 'Chart::supplyDemandAlignment');
    $routes->get('stock-reorder-point', 'Chart::stockReorderPoint');
    $routes->get('delivery-performance', 'Chart::deliveryPerformance');
    $routes->get('freight-costs', 'Chart::freightCosts');
    $routes->get('warehouse-utilization', 'Chart::warehouseUtilization');
    $routes->get('order-cycle-time', 'Chart::orderCycleTime');
    $routes->get('supplier-lead-time', 'Chart::supplierLeadTime');



});



