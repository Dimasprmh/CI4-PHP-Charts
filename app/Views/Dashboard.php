<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Daftar Isi Chart</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Chart</th>
            <th>Deskripsi</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Grafik Penjualan</td>
            <td>Menampilkan data penjualan bulanan dalam bentuk diagram batang</td>
            <td><a href="<?= base_url('chart.php#penjualan') ?>">Lihat</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Grafik Pertumbuhan Pengguna</td>
            <td>Visualisasi pertumbuhan jumlah pengguna dari waktu ke waktu</td>
            <td><a href="<?= base_url('chart.php#pengguna') ?>">Lihat</a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Grafik Pendapatan</td>
            <td>Diagram garis untuk menunjukkan fluktuasi pendapatan</td>
            <td><a href="<?= base_url('chart.php#pendapatan') ?>">Lihat</a></td>
        </tr>
    </tbody>
</table>

<?= $this->endSection() ?>
