<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<p>Grafik ini memperlihatkan hubungan antara penghematan biaya (Cost Savings) dan total pengeluaran (Total Spend) per bulan.</p>

<div id="cost_saving" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Cost Savings:
<?= print_r($savings, true); ?>
    </pre>
    <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Total Spend:
<?= print_r($spend, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('cost_saving', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Cost Savings & Spend Analysis'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Amount ($)'
        }
    },
    series: [{
        name: 'Cost Savings ($)',
        data: <?= json_encode($savings) ?>,
        color: 'darkgreen'
    }, {
        name: 'Total Spend ($)',
        data: <?= json_encode($spend) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

<?= $this->endSection() ?>
