<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan tren downtime dan aktivitas maintenance tiap bulan 2024.</p>

<div id="line-chart-downtime-maintenance" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px; flex-wrap:wrap;">
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Downtime (jam):
<?= print_r($downtime, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Jumlah Maintenance:
<?= print_r($maintenance, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('line-chart-downtime-maintenance', {
    chart: { type: 'line' },
    title: { text: 'Downtime & Maintenance Tracking - 2024' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Nilai' }
    },
    tooltip: {
        shared: true,
        crosshairs: true
    },
    series: [{
        name: 'Downtime (jam)',
        data: <?= json_encode($downtime) ?>,
        color: 'red',
        marker: { symbol: 'circle' }
    }, {
        name: 'Jumlah Maintenance',
        data: <?= json_encode($maintenance) ?>,
        color: 'blue',
        marker: { symbol: 'square' }
    }]
});
</script>

<?= $this->endSection() ?>
