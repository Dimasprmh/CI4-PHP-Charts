<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan perbandingan antara pasokan dan permintaan tiap bulan pada tahun 2024.</p>

<div id="supply-demand-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Supply:
<?= print_r($supply, true); ?>
    </pre>
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Demand:
<?= print_r($demand, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('supply-demand-chart', {
    chart: { type: 'column' },
    title: { text: 'Supply & Demand Alignment - 2024' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Unit' }
    },
    tooltip: {
        shared: true,
        headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
        pointFormat: '<span style="color:{series.color}">●</span> {series.name}: <b>{point.y} unit</b><br/>'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Supply',
        data: <?= json_encode($supply) ?>,
        color: 'green'
    }, {
        name: 'Demand',
        data: <?= json_encode($demand) ?>,
        color: 'red'
    }]
});
</script>

<?= $this->endSection() ?>
