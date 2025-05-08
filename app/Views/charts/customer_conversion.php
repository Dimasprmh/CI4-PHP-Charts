<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan tingkat konversi pelanggan setiap bulan.</p>

<div id="conversion-rate-chart" style="width:100%; height:400px;"></div>

<div style="margin-top: 20px; display: flex; justify-content: center;">
    <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-width: 600px;">
Conversion Rate:
<?= print_r($conversionRates, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('conversion-rate-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Customer Conversion Rate'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Conversion Rate (%)' },
        labels: {
            format: '{value}%'
        }
    },
    series: [{
        name: 'Conversion Rate',
        data: <?= json_encode($conversionRates) ?>,
        color: 'green'
    }],
    tooltip: {
        valueSuffix: '%'
    }
});
</script>

<?= $this->endSection() ?>
