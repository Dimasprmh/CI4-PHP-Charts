<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <p>Berikut adalah grafik analisis arus kas berdasarkan data bulanan.</p>
    <div id="cashflow-chart" style="width:100%; height:400px;"></div>

    <div style="display: flex; gap: 20px; margin-top: 20px;">
        <pre><?= "Pemasukan:\n" . print_r($pemasukan, true) ?></pre>
        <pre><?= "Pengeluaran:\n" . print_r($pengeluaran, true) ?></pre>
    </div>

    <script>
    Highcharts.chart('cashflow-chart', {
        chart: { type: 'line' },
        title: { text: 'Cash Flow Analysis 2024' },
        xAxis: { categories: <?= json_encode($bulanLabels) ?> },
        yAxis: { title: { text: 'Jumlah (Juta IDR)' } },
        series: [{
            name: 'Pemasukan',
            data: <?= json_encode($pemasukan) ?>,
            color: '#28a745'
        }, {
            name: 'Pengeluaran',
            data: <?= json_encode($pengeluaran) ?>,
            color: '#dc3545'
        }]
    });
    </script>
<?= $this->endSection() ?>
