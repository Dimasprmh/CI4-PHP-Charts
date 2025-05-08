<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan jumlah unit Work-In-Progress (WIP) tiap bulan pada tahun 2024.</p>

<div id="wip-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Jumlah WIP:
<?= print_r($wip, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('wip-chart', {
    chart: { type: 'column' },
    title: { text: 'Work-In-Progress (WIP) Tracking 2024' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Unit WIP' }
    },
    tooltip: {
        shared: true,
        pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: <b>{point.y} unit</b><br/>'
    },
    series: [{
        name: 'Jumlah WIP',
        data: <?= json_encode($wip) ?>,
        color: '#6f42c1'
    }]
});
</script>

<?= $this->endSection() ?>
