<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<p>Menampilkan status kepatuhan pajak berdasarkan kategori Wajib Pajak.</p>

<div id="tax-compliance-chart" style="width:100%; height:400px;"></div>

<div style="margin-top: 30px;">
    <h3>Debug Output :</h3>
    <pre style="background:#f9f9f9; border:1px solid #ccc; padding:10px;">
<?= print_r($data, true); ?>
    </pre>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('tax-compliance-chart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Tax Compliance Status'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Status Pajak',
        colorByPoint: true,
        data: <?= json_encode($data) ?>
    }]
});
</script>

<?= $this->endSection() ?>
