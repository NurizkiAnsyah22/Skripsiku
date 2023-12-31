<?php
if (isset($_POST['submit'])) {
    $koneksi = new mysqli("localhost", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah");

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk(" . date('d-m-Y') . ").xls");

    $bln = $_POST['bln'];
    $thn = $_POST['thn'];
?>

    <body>
        <center>
            <h2>Laporan Barang Masuk Bulan <?php echo $bln; ?> Tahun <?php echo $thn; ?></h2>
        </center>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Id Transaksi</th>
                <th>Tanggal Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Pengirim</th>
                <th>Jumlah Masuk</th>
                <th>Satuan Barang</th>
            </tr>

            <?php
            $no = 1;
            $sql = $koneksi->query("SELECT * FROM barang_masuk WHERE MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'");
            while ($data = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_transaksi'] ?></td>
                    <td><?php echo $data['tanggal'] ?></td>
                    <td><?php echo $data['kode_barang'] ?></td>
                    <td><?php echo $data['nama_barang'] ?></td>
                    <td><?php echo $data['pengirim'] ?></td>
                    <td><?php echo $data['jumlah'] ?></td>
                    <td><?php echo $data['satuan'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>

<?php
} else {
    $koneksi = new mysqli("localhost", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah", "gste8519_nurizkiansyah");
    $bln = $_POST['bln'];
    $thn = $_POST['thn'];
?>

    <?php if ($bln == 'all') { ?>
        <div class="table-responsive">
            <table class="display table table-bordered" id="transaksi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Pengirim</th>
                        <th>Jumlah Masuk</th>
                        <th>Satuan Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM barang_masuk WHERE YEAR(tanggal) = '$thn'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_transaksi'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td><?php echo $data['kode_barang'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['pengirim'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                            <td><?php echo $data['satuan'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="display table table-bordered" id="transaksi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Pengirim</th>
                        <th>Jumlah Masuk</th>
                        <th>Satuan Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM barang_masuk WHERE MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_transaksi'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td><?php echo $data['kode_barang'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['pengirim'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                            <td><?php echo $data['satuan'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

<?php } ?>
