<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan performa penjualan bulanan berdasarkan target dan pencapaian.</p>

<div id="sales-performance-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
    <pre style="background: #f8f9fa; border: 1px solid #ccc; padding: 10px; max-width: 300px;">
Target:
<?= print_r($target, true); ?>
    </pre>
    <pre style="background: #f8f9fa; border: 1px solid #ccc; padding: 10px; max-width: 300px;">
Pencapaian:
<?= print_r($pencapaian, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('sales-performance-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Sales Performance'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Penjualan (Juta IDR)' }
    },
    series: [{
        name: 'Target Penjualan',
        data: <?= json_encode($target) ?>,
        color: 'blue'
    }, {
        name: 'Pencapaian Penjualan',
        data: <?= json_encode($pencapaian) ?>,
        color: 'green'
    }]
});
</script>

<?= $this->endSection() ?>
