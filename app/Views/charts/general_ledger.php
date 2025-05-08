<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan ringkasan transaksi dalam General Ledger berdasarkan kategori utama.</p>

<div id="general-ledger-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Revenue:
<?= print_r($revenue, true); ?>
    </pre>
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Expenses:
<?= print_r($expenses, true); ?>
    </pre>
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Assets:
<?= print_r($assets, true); ?>
    </pre>
    <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Liabilities:
<?= print_r($liabilities, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('general-ledger-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'General Ledger Summary'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Pendapatan (Revenue)',
        data: <?= json_encode($revenue) ?>,
        color: '#007bff'
    }, {
        name: 'Beban (Expenses)',
        data: <?= json_encode($expenses) ?>,
        color: '#dc3545'
    }, {
        name: 'Aset (Assets)',
        data: <?= json_encode($assets) ?>,
        color: '#28a745'
    }, {
        name: 'Liabilitas (Liabilities)',
        data: <?= json_encode($liabilities) ?>,
        color: '#fd7e14'
    }]
});
</script>

<?= $this->endSection() ?>
