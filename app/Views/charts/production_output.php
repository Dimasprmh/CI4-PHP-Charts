<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan perbandingan antara output produksi aktual dan target per bulan tahun 2024.</p>

<div id="production-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px; flex-wrap:wrap;">
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Target:
<?= print_r($target, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Actual Output:
<?= print_r($actual, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('production-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Production Output vs Target 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Produksi (Unit)'
        }
    },
    tooltip: {
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            grouping: true,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Target',
        data: <?= json_encode($target) ?>,
        color: 'green'
    }, {
        name: 'Actual Output',
        data: <?= json_encode($actual) ?>,
        color: 'blue'
    }]
});
</script>

<?= $this->endSection() ?>
