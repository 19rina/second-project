<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail Mahasiswa</div>
                    <div class="card-body">
                   <!-- <form action="" method="post">-->
                    <?php echo form_open_multipart('mahasiswa/detailmhs')?>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $query_joinnya['id']?>">
                        <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $query_joinnya['nim']?>">
                        </div>                     
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $query_joinnya['nama_mhs']?>">
                        </div>
                        <div class="form-group">
                        <label for="fakul">Fakultas</label>
                        <select class="custom-select" id="fakul" name="fakul">
                        <?php foreach($fakultas as $datafak):?> <!--samakan dengan variable di mahasiswa control-->
                            <?php if($datafak['id'] == $query_joinnya['id_fakultas']):?>
                        <option value="<?= $datafak['id'];?>" selected><?= $datafak['nama_fakultas'];?></option>
                        <?php else:?>
                            <option value="<?= $datafak['id'];?>"><?= $datafak['nama_fakultas'];?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                        </select> 
                        </div> 
                        <div class="form-group">
                        <label for="pro">Prodi</label>
                        <select class="custom-select" id="pro" name="pro">
                        <?php foreach($prodi as $datapro):?> <!--samakan dengan variable di mahasiswa control-->
                        <?php if($datapro['id'] == $query_joinnya['id_prodi']):?>
                        <option value="<?= $datapro['id'];?>" selected><?= $datapro['nama_prodi'];?></option>
                        <?php else:?>
                            <option value="<?= $datapro['id'];?>"><?= $datapro['nama_prodi'];?></option>                        
                        <?php endif;?>
                        <?php endforeach;?>
                        </select> 
                        </div>
                        <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" id="pass" name="pass" value="<?= $query_joinnya['password']?>">
                        </div> 
                        <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="<?= $query_joinnya['image']?>">
                        </div>                                                
                        <div class="form-group">
                        <button class="btn btn-primary float-right">Ubah</button>
                        </div>
                        <?php echo form_close();?>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>