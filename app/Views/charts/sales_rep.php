<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Grafik ini menunjukkan kinerja perwakilan penjualan berdasarkan total penjualan yang mereka capai.</p>

<div id="sales-rep-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px;">
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Nama Sales:
<?= print_r($namaSales, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Total Penjualan:
<?= print_r($totalSales, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('sales-rep-chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Sales Rep Performance'
    },
    xAxis: {
        categories: <?= json_encode($namaSales) ?>,
        title: {
            text: 'Sales Representatives'
        }
    },
    yAxis: {
        title: {
            text: 'Total Sales (in Juta IDR)'
        }
    },
    series: [{
        name: 'Total Sales',
        data: <?= json_encode($totalSales) ?>,
        color: 'blue'
    }]
});
</script>

<?= $this->endSection() ?>
