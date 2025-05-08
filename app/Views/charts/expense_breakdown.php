<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan pembagian pengeluaran berdasarkan kategori utama.</p>

<div id="expense-breakdown-chart" style="width:100%; height:400px;"></div>

<div style="margin-top: 20px;">
    <h3>Debug Output:</h3>
    <pre style="background: #f8f9fa; border: 1px solid #ddd; padding: 15px; overflow-x: auto;">
<?= print_r($data, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('expense-breakdown-chart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Expense Breakdown'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Pengeluaran',
        colorByPoint: true,
        data: <?= json_encode($data) ?>
    }]
});
</script>

<?= $this->endSection() ?>
