<!DOCTYPE html>
<html lang="id">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
