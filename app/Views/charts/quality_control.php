<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan metrik Quality Control per bulan dalam bentuk grafik batang.</p>

<div id="qc-bar-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Defect Rate (%):
<?= print_r($defect, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Yield (%):
<?= print_r($yield, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Rework Count:
<?= print_r($rework, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('qc-bar-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Quality Control Metrics - 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: [{
        min: 0,
        title: { text: 'Persentase (%)' },
        labels: { format: '{value}%' }
    }, {
        min: 0,
        title: { text: 'Jumlah Rework' },
        opposite: true
    }],
    tooltip: { shared: true },
    plotOptions: {
        column: {
            grouping: true,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Defect Rate (%)',
        data: <?= json_encode($defect) ?>,
        yAxis: 0,
        color: 'red'
    }, {
        name: 'Yield (%)',
        data: <?= json_encode($yield) ?>,
        yAxis: 0,
        color: 'green'
    }, {
        name: 'Rework Count',
        data: <?= json_encode($rework) ?>,
        yAxis: 1,
        color: 'blue'
    }]
});
</script>

<?= $this->endSection() ?>
