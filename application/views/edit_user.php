<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container" style="margin-top: 80px">
        <div class="col-md-12">
            <?php echo form_open('mahasiswa/update') ?>

              <div class="form-group">
                <label for="text">NIM</label>
                <input type="text" name="nim" value="<?php echo $data_user->nim ?>" class="form-control" placeholder="Masukkan No. ISBN">
              </div>

              <div class="form-group">
                <label for="text">Nama</label>
                <input type="text" name="nama_mhs" value="<?php echo $data_user->nama_mhs ?>" class="form-control" placeholder="Masukkan Nama Buku">
              </div>

              

              <button type="submit" class="btn btn-md btn-success">Update</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button>
            <?php echo form_close() ?>
        </div>
    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>