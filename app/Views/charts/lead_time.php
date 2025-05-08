<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Grafik ini menunjukkan dua metrik penting dalam logistik dan pengadaan</p>

<div id="lead_time" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Lead Time (Day):
<?= print_r($lead_time, true); ?>
    </pre>
    <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
On-Time Delivery (%):
<?= print_r($on_time, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('lead_time', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Lead Time & Delivery Status'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Metrik Kinerja' }
    },
    series: [{
        name: 'Lead Time (Day)',
        data: <?= json_encode($lead_time) ?>,
        color: 'blue'
    }, {
        name: 'On-Time Delivery (%)',
        data: <?= json_encode($on_time) ?>,
        color: 'red',
        dashStyle: 'Dash'
    }]
});
</script>

<?= $this->endSection() ?>
