<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Analisis rata-rata waktu tunggu (lead time) dari berbagai supplier selama tahun 2024.</p>

<div id="supplier-lead-time-chart" style="width:100%; height:400px;"></div>

<div style="display:flex;gap:20px;margin-top:30px;flex-wrap:wrap;">
    <pre style="flex:1;background:#f8f8f8;padding:10px;border:1px solid #ccc;">
Supplier:
<?= print_r($suppliers, true); ?>
    </pre>
    <pre style="flex:1;background:#f8f8f8;padding:10px;border:1px solid #ccc;">
Lead Time:
<?= print_r($leadTimes, true); ?>
    </pre>  
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('supplier-lead-time-chart', {
    chart: { type: 'column' },
    title: { text: 'Supplier Lead Time Analysis - 2024' },
    subtitle: { text: 'Rata-rata hari dari PO ke penerimaan barang' },
    xAxis: {
        categories: <?= json_encode($suppliers) ?>,
        crosshair: true,
        title: { text: 'Nama Supplier' }
    },
    yAxis: {
        min: 0,
        title: { text: 'Lead Time (Hari)' }
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
        name: 'Lead Time',
        data: <?= json_encode($leadTimes) ?>,
        color: 'orange'
    }]
});
</script>

<?= $this->endSection() ?>
