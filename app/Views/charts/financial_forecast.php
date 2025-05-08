<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Grafik ini menampilkan data keuangan aktual dan proyeksi keuangan untuk bulan mendatang.</p>

<div id="financial-forecast-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; justify-content:center; gap:20px; margin-top:20px;">
    <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-width: 300px;">
Revenue:
<?= print_r($revenueActual, true); ?>
    </pre>
    <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-width: 300px;">
Expenses:
<?= print_r($expensesActual, true); ?>
    </pre>
    <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-width: 300px;">
Profit:
<?= print_r($profitActual, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('financial-forecast-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Financial Forecasting (Aktual & Prediksi)'
    },
    xAxis: {
        categories: <?= json_encode($allMonths) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Revenue (Actual)',
        data: <?= json_encode($revenueActual) ?>,
        color: '#28a745'
    }, {
        name: 'Expenses (Actual)',
        data: <?= json_encode($expensesActual) ?>,
        color: '#dc3545'
    }, {
        name: 'Profit (Actual)',
        data: <?= json_encode($profitActual) ?>,
        color: '#ffc107'
    }, {
        name: 'Revenue (Forecast)',
        data: <?= json_encode($revenueForecast) ?>,
        color: '#28a745',
        dashStyle: 'ShortDash'
    }, {
        name: 'Expenses (Forecast)',
        data: <?= json_encode($expensesForecast) ?>,
        color: '#dc3545',
        dashStyle: 'ShortDash'
    }, {
        name: 'Profit (Forecast)',
        data: <?= json_encode($profitForecast) ?>,
        color: '#ffc107',
        dashStyle: 'ShortDash'
    }]
});
</script>

<?= $this->endSection() ?>
