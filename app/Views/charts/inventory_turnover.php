<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan rasio perputaran persediaan (Inventory Turnover) per bulan tahun 2024.</p>

<div id="inventory-turnover-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Turnover Ratio:
<?= print_r($ratio, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('inventory-turnover-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Inventory Turnover Ratio 2024'
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
            text: 'Turnover Ratio'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
        pointFormat: '<span style="color:{series.color}">●</span> {series.name}: <b>{point.y} kali</b><br/>',
        shared: true
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Inventory Turnover',
        data: <?= json_encode($ratio) ?>,
        color: '#17a2b8'
    }]
});
</script>

<?= $this->endSection() ?>
