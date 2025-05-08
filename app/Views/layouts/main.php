<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Halaman') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
