<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan Sales Pipeline & Forecasting per bulan.</p>

<div id="sales-pipeline-chart" style="width:100%; height:500px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Leads:
<?= print_r($leads, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Qualified Leads:
<?= print_r($qualified, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Proposals:
<?= print_r($proposals, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Deals Closed:
<?= print_r($deals, true); ?>
    </pre>
    <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Forecast:
<?= print_r($forecast, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('sales-pipeline-chart', {
    chart: { type: 'column' },
    title: { text: 'Sales Pipeline & Forecasting' },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Unit/Pelanggan)' }
    },
    tooltip: { shared: true },
    series: [
        {
            name: 'Leads (Calon pelanggan)',
            data: <?= json_encode($leads) ?>,
            color: 'blue'
        },
        {
            name: 'Leads yang memenuhi syarat',
            data: <?= json_encode($qualified) ?>,
            color: 'green'
        },
        {
            name: 'Proposal yang dikirim',
            data: <?= json_encode($proposals) ?>,
            color: 'orange'
        },
        {
            name: 'Kesepakatan yang berhasil ditutup',
            data: <?= json_encode($deals) ?>,
            color: 'red'
        },
        {
            name: 'Perkiraan penjualan di masa depan',
            type: 'line',
            data: <?= json_encode($forecast) ?>,
            color: 'teal',
            dashStyle: 'ShortDash'
        }
    ]
});
</script>

<?= $this->endSection() ?>
