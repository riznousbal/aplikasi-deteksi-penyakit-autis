   <!-- Page Heading -->
   <div class="row">
       <div class="col-lg-12">
           <h1 class="page-header">
               Jenis Penyakit <small>Berisi jenis - jenis penyakit gigi dan mulut</small>
           </h1>
           <ol class="breadcrumb">
               <li class="">
                   <i class="fa fa-th-list"></i> Jenis - Jenis Penyakit

               </li>
               <li class="active">
                   Ubah Penyakit
               </li>
           </ol>
       </div>
   </div>
   <!-- /.row -->

   <!-- ambil data -->
   <?php
    $id = $_GET['id'];
    $get = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit='$id'");
    $set = $get->fetch_assoc();
    ?>


   <form action="" method="post">

       <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
       <div class="form-group">
           <label for="">Nama</label>
           <input type="text" class="form-control" name="nama" value="<?= $set['nama_penyakit'] ?>">
       </div>
       <div class="form-group">
           <label for="">Defenisi</label>
           <textarea id="tek" rows="5" class="form-control" name="defenisi"><?= $set['defenisi'] ?></textarea>
       </div>
       <div class="form-group text-right">
           <button class="btn btn-secondary" name="kembali">Kembali</button>
           <button class="btn btn-primary" name="ubah">Ubah</button>
       </div>

   </form>

   <?php
    if (isset($_POST['ubah'])) {
        $nama = $_POST['nama'];
        $defenisi = $_POST['defenisi'];

        $koneksi->query("UPDATE penyakit SET nama_penyakit = '$nama', defenisi='$defenisi' WHERE id_penyakit='$id'");

        echo "<script>alert('Data Telah Diubah');location='index.php?page=penyakit'</script>";
    } elseif (isset($_POST['kembali'])) {
        echo "<script>location='index.php?page=penyakit'</script>";
    }
