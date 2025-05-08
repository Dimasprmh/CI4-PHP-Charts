<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan performa pengiriman berdasarkan ketepatan dan status per bulan di tahun <?= $tahun ?>.</p>

<div id="delivery-performance-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
    <pre><?= print_r($bulan, true) ?></pre>
    <pre><?= print_r($onTime, true) ?></pre>
    <pre><?= print_r($late, true) ?></pre>
    <pre><?= print_r($pending, true) ?></pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('delivery-performance-chart', {
    chart: { type: 'column' },
    title: { text: 'Delivery Performance & Status - <?= $tahun ?>' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah Pengiriman' }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' pengiriman'
    },
    series: [{
        name: 'On Time',
        data: <?= json_encode($onTime) ?>,
        color: 'green'
    }, {
        name: 'Late',
        data: <?= json_encode($late) ?>,
        color: 'gold'
    }, {
        name: 'Pending',
        data: <?= json_encode($pending) ?>,
        color: 'red'
    }]
});
</script>

<?= $this->endSection() ?>
