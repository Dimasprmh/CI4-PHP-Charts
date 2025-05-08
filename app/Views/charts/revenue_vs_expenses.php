<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Grafik perbandingan pendapatan dan pengeluaran berdasarkan data bulanan.</p>

<div id="revenue-expenses-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; margin-top: 20px;">
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
        Revenue:
        <?= print_r($revenue, true); ?>
    </pre>
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
        Expenses:
        <?= print_r($expenses, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('revenue-expenses-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Revenue vs. Expenses'
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
        color: '#2ecc71'
    }, {
        name: 'Expenses (Pengeluaran)',
        data: <?= json_encode($expenses) ?>,
        color: '#e74c3c'
    }]
});
</script>

<?= $this->endSection() ?>
