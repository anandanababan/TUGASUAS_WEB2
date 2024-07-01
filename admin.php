<!--panggil file header -->
<?php include "header.php"; ?>



<?php

//uji jika tombol simapn diklik

if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

//htmsepecilachars agarinput lebih aman
    $nama =htmlspecialchars($_POST['nama'],ENT_QUOTES);
    $alamat =htmlspecialchars($_POST['alamat'],ENT_QUOTES);
    $jurusan=htmlspecialchars($_POST['jurusan'],ENT_QUOTES);
    $nohp=htmlspecialchars($_POST['nohp'],ENT_QUOTES);
   
    
    
//persipan qureyu simapn dMASAAAata
    $simpan =mysqli_query($koneksi,"INSERT INTO mahasiswa VALUES('','$tgl','$nama','$alamat','$jurusan','$nohp')");
//uji simapn jika sukses
    if($simpan){
        echo"<script>alert('Simpan data asukses');document.location='?'</script>";
    }else{
        echo"<script>alert('Simpan data gagal');document.location='?'</script>";
    
    }
}

?>
         <!--head-->
    <div class="head text-center">
        <img src="asset/img/aaaaa.jpeg" width="100">
        <h2 class="text-white">ILMU KOMPUTER<br>GABE</h2>
    </div>
    <!-- end head-->
    <!-- awal row-->
    <div class="row at-2">
        <!-- col-ig-7-->
        <div class="ol-lg-7 mb-3">
            <div class="card shadow bg-gradient-light">
                <!-- card body-->
                <div class="card-body">
              
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Indentitas Pengunjung</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text"class="form-control from-control-user"name="nama"placeholder="Nama Pengunjung"required>

                                </div>
                                <div class="form-group">
                                    <input type="text"class="form-control from-control-user"name="alamat"placeholder="alamat Pengunjung"required>

                                </div>
                                <div class="form-group">
                                    <input type="text"class="form-control from-control-user"name="jurusan"placeholder="jurusan"required>


                                </div>
                                <div class="form-group">
                                    <input type="text"class="form-control from-control-user"name="nohp"placeholder="Nomor HP Pengunjung"required>

                                </div>

                                <button type="submit"name="bsimpan" class="btn btn-primary btn-user btn-block"> SIMPAN DATA</button>
                               
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">BY.ANANDA ROGABE |2024 -<?=date('Y') ?></a>
                            </div>
                </div>
                <!-- end card-body-->

            </div>
        </div>
        <!--  end col-ig-7-->

        <!-- col-ig-5-->
        <div class="col-lg-5 mb-3">
            <!-- card-->
            <div class="card shadow ">
                <!-- card body-->
                <div class="card-body">
                    <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                    </div>
                    <?php
                    //deklarasi tanggal

                    //menampilakan tanggal sekarang
                      $tgl_sekarang = date('Y-m-d');

                    //menapilakan tanggal kemarin
                    $kemarin = date('Y-m-d',strtotime('-1 day',strtotime(date('Y-m-d'))));
                    //mendapatkan 6b hari sebelum tanggal sekrang
                    $seminggu = date('Y-m-d h:i:s',strtotime('-1 week +1day', strtotime($tgl_sekarang)));
                   

                    $sekarang = date(('Y-m-d h:i:s'));

                    

                    //persiapan query tamilakna jumlah data pengunjung

                    $tgl_sekarang = mysqli_fetch_array(mysqli_query($koneksi,"SELECT count(*)FROM mahasiswa where tanggal like '%$tgl_sekarang%'"));
                    //kemarin
                    $kemarin = mysqli_fetch_array(mysqli_query($koneksi,"SELECT count(*)FROM mahasiswa where tanggal like '%$kemarin%'"));
                    //seminggu
                    $seminggu = mysqli_fetch_array(mysqli_query($koneksi,"SELECT count(*)FROM mahasiswa where tanggal BETWEEN '$seminggu'and'$sekarang'"));
                   //sebulan
                   $bulan_ini=date('m');
                    $sebulan = mysqli_fetch_array(mysqli_query($koneksi,"SELECT count(*)FROM mahasiswa where month(tanggal)='$bulan_ini' "));
                    //keseluruhan
                    $keseluruhan = mysqli_fetch_array(mysqli_query($koneksi,"SELECT count(*)FROM mahasiswa  "));

                  
                  
                  


                    ?>
                    <table class="table table-bordered ">
                        <tr>
                            <td>Hari ini</td>
                            <td><?=$tgl_sekarang[0]?></td>
                        </tr>
                        <tr>
                            <td>Kemarin</td>
                            <td><?=$kemarin[0]?></td>
                        </tr>
                        <tr>
                            <td>MINGGU INI</td>
                            <td><?=$seminggu[0]?></td>
                        </tr>
                        <tr>
                            <td>Bulan ini</td>
                            <td><?=$sebulan[0]?></td>
                        </tr>
                        <tr>
                            <td>Keseluruhan</td>
                            <td>:<?=$keseluruhan[0]?></td>
                        </tr>

                    </table>    
                  
                </div>
                <!-- end card body-->
            </div>
              <!-- end  card-->
        </div>    
        <!--  end col-ig-5-->

                   
                

    </div>
    
    <!-- end row-->
      <!-- card-->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Hari Ini [<?=date('d-m-y')?>]</h6>
                        </div>
                        <div class="card-body">
                            <a href="rekapitulasi.php"class="btn btn-success mb-3"><i class="fa fa-table">Rekapitulasi Mahasiswa</i></a>
                            <a href="Logout.php"class="btn btn-danger mb-3"><i class="fa fa-off">Logout</i></a>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>N0.HP</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>N0.HP</th>
                                            
                                           </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tgl = date('Y-m-d');//memangil tanggal hari ini
                                        $tampil =mysqli_query($koneksi,"SELECT*FROM mahasiswa where tanggal like'%$tgl%' order by id desc ");//peritah query data tamu berdasar kan tanggal 
                                        $no=1;
                                        while($data=mysqli_fetch_array($tampil)){
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
                            </div>
                        </div>
                    </div>

<!--panggil file footer -->
  <?php include "footer.php"; ?>
   