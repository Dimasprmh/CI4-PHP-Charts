<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Accounts Payable & Receivable</h2>
<p>Menampilkan perbandingan antara akun yang harus dibayar dan yang harus diterima.</p>

<div id="payable-receivable-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Receivable:
<?= print_r($receivable, true); ?>
    </pre>
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Payable:
<?= print_r($payable, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('payable-receivable-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Accounts Payable & Receivable'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Accounts Receivable',
        data: <?= json_encode($receivable) ?>,
        color: '#28a745'
    }, {
        name: 'Accounts Payable',
        data: <?= json_encode($payable) ?>,
        color: '#dc3545'
    }]
});
</script>

<?= $this->endSection() ?>
x