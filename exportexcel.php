<?php
include "koneksi.php";

//persiapan untuk excel
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment;filename=Export Excel Data Mahasiswa.xls ");
header("Pragma:no-cache");
header("Expires:0");

?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Data Mahasiswa</th>
        </tr>
        <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Mahasiswa</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                                <th>No. HP</th>
                            </tr>
        
    </thead>
    <tbody>
                            <?php
                            $tgl1 = isset($_POST['tanggala']) ? $_POST['tanggala'] : '';
                            $tgl2 = isset($_POST['tanggalb']) ? $_POST['tanggalb'] : '';

                            $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal asc");
                            $no = 1;
                            while($data = mysqli_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['tanggal']?></td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['alamat']?></td>
                                <td><?=$data['jurusan']?></td>
                                <td><?=$data['nohp']?></td>
                            </tr>
                            <?php }?>
                        </tbody>
    
</table>