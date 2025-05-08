<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Membandingkan anggaran yang direncanakan (Budget) dengan hasil keuangan sebenarnya (Actual).</p>

<div id="budget-actual-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
    <pre style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9; max-width: 300px;">
        Budget:
        <?= print_r($budget, true); ?>
    </pre>
    <pre style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9; max-width: 300px;">
        Actual:
        <?= print_r($actual, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('budget-actual-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Budget vs. Actual'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Anggaran (Budget)',
        data: <?= json_encode($budget) ?>,
        color: '#0367fc'
    }, {
        name: 'Realisasi (Actual)',
        data: <?= json_encode($actual) ?>,
        color: '#fcba03'
    }]
});
</script>

<?= $this->endSection() ?>
