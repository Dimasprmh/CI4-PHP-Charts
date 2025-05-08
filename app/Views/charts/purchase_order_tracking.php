<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menunjukkan jumlah pesanan pembelian (Purchase Orders) yang dibuat dan diselesaikan selama periode waktu tertentu (per bulan)</p>

<div id="purchase_order" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px; flex-wrap: wrap;">
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Orders Created:
<?= print_r($created, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Orders Completed:
<?= print_r($completed, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('purchase_order', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Purchase Order Tracking'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Pesanan'
        }
    },
    series: [{
        name: 'Orders Created',
        data: <?= json_encode($created) ?>,
        color: 'blue'
    }, {
        name: 'Orders Completed',
        data: <?= json_encode($completed) ?>,
        color: 'red',
        dashStyle: 'Dash'
    }]
});
</script>

<?= $this->endSection() ?>
