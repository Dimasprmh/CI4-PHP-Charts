<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan jumlah Work Order berdasarkan status tiap bulan tahun 2024.</p>

<div id="work-order-chart" style="width:100%; height:400px;"></div>

<div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Bulan:
<?= print_r($bulan, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Completed:
<?= print_r($completed, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
In Progress:
<?= print_r($in_progress, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Pending:
<?= print_r($pending, true); ?>
    </pre>
    <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Cancelled:
<?= print_r($cancelled, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('work-order-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Work Order Management - 2024'
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
            text: 'Jumlah Work Order'
        }
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: true,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Completed',
        data: <?= json_encode($completed) ?>,
        color: 'green'
    }, {
        name: 'In Progress',
        data: <?= json_encode($in_progress) ?>,
        color: 'blue'
    }, {
        name: 'Pending',
        data: <?= json_encode($pending) ?>,
        color: 'yellow'
    }, {
        name: 'Cancelled',
        data: <?= json_encode($cancelled) ?>,
        color: 'red'
    }]
});
</script>

<?= $this->endSection() ?>
