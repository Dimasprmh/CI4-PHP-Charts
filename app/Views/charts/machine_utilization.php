<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan persentase pemanfaatan mesin setiap bulan tahun 2024.</p>

<div id="machine-utilization-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px; flex-wrap:wrap;">
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Utilization Rate (%):
<?= print_r($utilization, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('machine-utilization-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Machine Utilization Rate 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        max: 100,
        title: { text: 'Utilization (%)' }
    },
    tooltip: {
        shared: true,
        useHTML: true,
        pointFormat:
            '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}%</b></td></tr>',
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Utilization Rate',
        data: <?= json_encode($utilization) ?>,
        color: 'blue'
    }]
});
</script>

<?= $this->endSection() ?>
