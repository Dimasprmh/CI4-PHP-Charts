<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan gambaran keuntungan dan kerugian bulanan berdasarkan Revenue dan Expenses.</p>

<div id="profit-loss-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; margin-top: 20px;">
    <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
        Revenue:
        <?= print_r($revenue, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
        Expenses:
        <?= print_r($expenses, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
        Profit:
        <?= print_r($profit, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('profit-loss-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Profit & Loss Overview (2024)'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah (Juta IDR)'
        }
    },
    series: [{
        name: 'Revenue (Pendapatan)',
        data: <?= json_encode($revenue) ?>,
        color: '#28a745'
    }, {
        name: 'Expenses (Pengeluaran)',
        data: <?= json_encode($expenses) ?>,
        color: '#dc3545'
    }, {
        name: 'Profit',
        data: <?= json_encode($profit) ?>,
        color: '#ffc107'
    }]
});
</script>

<?= $this->endSection() ?>
