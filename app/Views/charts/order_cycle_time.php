<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan rata-rata waktu pemenuhan pesanan (dalam hari) tiap bulan selama tahun 2024.</p>

<div id="order-fulfillment-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Cycle Time:
<?= print_r($cycle_time, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('order-fulfillment-chart', {
    chart: { type: 'column' },
    title: { text: 'Order Fulfillment Cycle Time - 2024' },
    subtitle: { text: 'Rata-rata waktu dari pesanan masuk hingga pengiriman selesai' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Cycle Time (Hari)' }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' hari'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y} hari'
            }
        }
    },
    series: [{
        name: 'Cycle Time',
        data: <?= json_encode($cycle_time) ?>,
        color: '#20c997'
    }]
});
</script>

<?= $this->endSection() ?>
