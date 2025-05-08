<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Produk/layanan terlaris berdasarkan jumlah unit yang terjual</p>

<div id="top-selling-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px;">
    <pre style="flex:1; background:#f1f1f1; border:1px solid #ccc; padding:10px;">
Produk:
<?= print_r($produk, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; border:1px solid #ccc; padding:10px;">
Jumlah Terjual:
<?= print_r($jumlah, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('top-selling-chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Top Selling Products/Services'
    },
    xAxis: {
        categories: <?= json_encode($produk) ?>,
        title: {
            text: 'Produk / Layanan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Terjual'
        }
    },
    series: [{
        name: 'Unit Terjual',
        data: <?= json_encode($jumlah) ?>,
        color: 'blue'
    }]
});
</script>

<?= $this->endSection() ?>
