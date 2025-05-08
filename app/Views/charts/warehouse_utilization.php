<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan persentase pemanfaatan kapasitas gudang per bulan selama tahun 2024.</p>

<div id="warehouse-capacity-chart" style="width:100%; height:400px;"></div>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
    <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Kapasitas Terpakai:
<?= print_r($kapasitas, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('warehouse-capacity-chart', {
    chart: { type: 'column' },
    title: { text: 'Warehouse Capacity Utilization - 2024' },
    subtitle: { text: 'Pemanfaatan kapasitas gudang dalam persen tiap bulan' },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: { text: 'Bulan' }
    },
    yAxis: {
        min: 0,
        max: 100,
        title: { text: 'Persentase Kapasitas Terpakai (%)' },
        labels: { format: '{value}%' }
    },
    tooltip: {
        shared: true,
        valueSuffix: '%'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}%'
            }
        }
    },
    series: [{
        name: 'Utilisasi Kapasitas Gudang',
        data: <?= json_encode($kapasitas) ?>,
        color: 'purple'
    }]
});
</script>

<?= $this->endSection() ?>
