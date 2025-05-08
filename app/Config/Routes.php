<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route (beranda / dashboard)
$routes->get('/', 'Dashboard::index');

// Route untuk halaman daftar semua chart
$routes->get('chart', 'Chart::index'); // ⬅️ INI penting agar /chart langsung tampil daftar

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
});



