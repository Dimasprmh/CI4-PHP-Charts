<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan posisi stok dibandingkan dengan Reorder Point (ROP) untuk setiap item bulan <?= $bulan ?> <?= $tahun ?>.</p>

<div id="reorder-point-chart" style="width:100%; height:400px;"></div>

<!-- Debug -->
<div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
    <pre>Barang: <?= print_r($barang, true); ?></pre>
    <pre>Stock: <?= print_r($stock, true); ?></pre>
    <pre>ROP: <?= print_r($rop, true); ?></pre>
    <pre>Minimum Stock: <?= print_r($minstock, true); ?></pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('reorder-point-chart', {
    chart: { type: 'column' },
    title: { text: 'Stock Reorder Point - <?= $bulan ?> <?= $tahun ?>' },
    xAxis: {
        categories: <?= json_encode($barang) ?>,
        title: { text: 'Nama Barang' },
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Unit' }
    },
    tooltip: { shared: true, valueSuffix: ' unit' },
    plotOptions: { column: { grouping: true, borderWidth: 0 } },
    series: [
        { name: 'Stock Saat Ini', data: <?= json_encode($stock) ?>, color: 'blue' },
        { name: 'Reorder Point', data: <?= json_encode($rop) ?>, color: 'gold' },
        { name: 'Minimum Stock', data: <?= json_encode($minstock) ?>, color: 'red' }
    ]
});
</script>

<?= $this->endSection() ?>
