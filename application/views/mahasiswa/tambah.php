<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Mahasiswa</div>
                    <div class="card-body">
                    <?php if(validation_errors()) :?>
                    <div class="alert alert-danger" role="alert">
                    <?= validation_errors()?>
                    </div>
                    <?php endif;?>
                    <form action="" method="post">
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="">
                        </div> 
                        <div class="form-group">
                        <label for="fakul">Fakultas</label>
                        <select class="custom-select" id="fakul" name="fakul">
                        <option value="">Pilih</option>
                        <?php foreach($fakultas as $datafak):?> <!--samakan dengan variable di mahasiswa control-->
                        <option value="<?= $datafak['id']?>"><?= $datafak['nama_fakultas']?></option>
                        <?php endforeach;?>
                        </select> 
                        </div> 
                        <div class="form-group">
                        <label for="pro">Prodi</label>
                        <select class="custom-select" id="pro" name="pro">
                        <option value="">Pilih</option>
                        <?php foreach($prodi as $datapro):?> <!--samakan dengan variable di mahasiswa control-->
                        <option value="<?= $datapro['id']?>"><?= $datapro['nama_prodi']?></option>
                        <?php endforeach;?>
                        </select> 
                        </div>

                        <div class="form-group">
                      
                        <input type="password" class="form-control" id="pass" name="pass1" placeholder="Password">
                        <?= form_error('pass1','<small class="text-danger pl-3">','</small> '); ?>
                        </div>  

                        <div class="form-group">
                        
                        <input type="password" class="form-control" id="pass" name="pass2" placeholder="Repeat Password">
                        </div>
                        <!-- <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="">
                        </div>                          -->
                        <div class="form-group">
                        <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>