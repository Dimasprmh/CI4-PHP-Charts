<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan total biaya pengiriman dan transportasi per bulan sepanjang tahun.</p>

<!-- Chart -->
<div id="freight-cost-chart" style="width:100%; height:400px;"></div>

<!-- Debug Output -->
<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Biaya Pengiriman (juta):
<?= print_r($biaya, true); ?>
    </pre>
</div>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('freight-cost-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Freight & Transportation Costs - 2024'
    },
    subtitle: {
        text: 'Biaya logistik per bulan'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Biaya (juta Rupiah)'
        },
        labels: {
            formatter: function () {
                return 'Rp ' + this.value + ' jt';
            }
        }
    },
    tooltip: {
        shared: true,
        valuePrefix: 'Rp ',
        valueSuffix: ' jt'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Biaya Pengiriman',
        data: <?= json_encode($biaya) ?>,
        color: 'lightblue'
    }]
});
</script>

<?= $this->endSection() ?>
