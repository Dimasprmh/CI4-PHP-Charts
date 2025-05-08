<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan jumlah audit yang dilakukan serta tingkat kepatuhan setiap bulannya.</p>

<div id="audit-compliance-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
    <pre style="background:#f9f9f9; border:1px solid #ccc; padding:10px; max-width:300px;">
Audit:
<?= print_r($audit, true); ?>
    </pre>
    <pre style="background:#f9f9f9; border:1px solid #ccc; padding:10px; max-width:300px;">
Compliance:
<?= print_r($compliance, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('audit-compliance-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Audit & Compliance Reports'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Jumlah Audit & Kepatuhan (%)' }
    },
    tooltip: {
        shared: true,
        crosshairs: true
    },
    series: [{
        name: 'Audit Dilakukan',
        data: <?= json_encode($audit) ?>,
        color: '#0367fc'
    }, {
        name: 'Kepatuhan (%)',
        data: <?= json_encode($compliance) ?>,
        color: '#28a745'
    }]
});
</script>

<?= $this->endSection() ?>
