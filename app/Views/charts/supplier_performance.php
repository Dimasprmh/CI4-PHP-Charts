<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Grafik ini membandingkan dua metrik utama performa supplier</p>

<div id="sup_performance" style="width:100%; height:400px;"></div>

<div style="display:flex; gap:20px; margin-top:30px;">
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Supplier:
<?= print_r($suppliers, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
On-time Delivery (%):
<?= print_r($onTime, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Quality Rating:
<?= print_r($quality, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('sup_performance', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Supplier Performance Analysis'
    },
    xAxis: {
        categories: <?= json_encode($suppliers) ?>,
        title: {
            text: 'Supplier'
        }
    },
    yAxis: {
        title: {
            text: 'Performance Metrics'
        }
    },
    series: [{
        name: 'On-time Delivery (%)',
        data: <?= json_encode($onTime) ?>,
        color: 'darkgreen'
    }, {
        name: 'Quality Rating (1-5)',
        data: <?= json_encode($quality) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

<?= $this->endSection() ?>
