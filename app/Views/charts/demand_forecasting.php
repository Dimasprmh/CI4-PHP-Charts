<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan perbandingan permintaan aktual, forecast, dan produksi rencana dalam bentuk grafik batang.</p>

<div id="demand-bar-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:30px;">
    <pre>Bulan: <?= print_r($bulan, true) ?></pre>
    <pre>Actual Demand: <?= print_r($actual, true) ?></pre>
    <pre>Forecasted Demand: <?= print_r($forecast, true) ?></pre>
    <pre>Planned Production: <?= print_r($planned, true) ?></pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('demand-bar-chart', {
    chart: { type: 'column' },
    title: { text: 'Demand Forecasting & Planning 2024' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Unit' }
    },
    tooltip: { shared: true },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [
        { name: 'Actual Demand', data: <?= json_encode($actual) ?>, color: 'blue' },
        { name: 'Forecasted Demand', data: <?= json_encode($forecast) ?>, color: 'gold' },
        { name: 'Planned Production', data: <?= json_encode($planned) ?>, color: 'green' }
    ]
});
</script>

<?= $this->endSection() ?>
