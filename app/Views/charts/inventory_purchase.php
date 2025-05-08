<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menunjukkan tren pembelian dan penggunaan inventaris selama periode waktu tertentu.</p>

<div id="inventory_purchase" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Inventory Purchased:
<?= print_r($purchased, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Inventory Used:
<?= print_r($used, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('inventory_purchase', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Inventory Purchase Trends'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah Inventaris' }
    },
    series: [{
        name: 'Inventory Purchased',
        data: <?= json_encode($purchased) ?>,
        color: 'green'
    }, {
        name: 'Inventory Used',
        data: <?= json_encode($used) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

<?= $this->endSection() ?>
