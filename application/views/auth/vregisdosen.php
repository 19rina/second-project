<div class="container p-5">

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Dosen</div>
                    <div class="card-body">
                    <?php if(validation_errors()) :?>
                    <div class="alert alert-danger" role="alert">
                    <?= validation_errors()?>
                    </div>
                    <?php endif;?>
                    <form action="<?= base_url();?>dosen/tambah" method="post">
                        <div class="form-group">
                        
                        <input type="text" class="form-control" id="nama" name="nama_dsn" placeholder="Nama">
                        <?= form_error('nama','<small class="text-danger pl-3">','</small> '); ?>
                        </div>
                        <div class="form-group">
                        
                        <input type="text" class="form-control" id="nim" name="nidn" placeholder="NIDN">
                        <?= form_error('nim','<small class="text-danger pl-3">','</small> '); ?>
                        </div> 
                        <div class="form-group">
                       
                        

                        
                        <div class="form-group">
                      
                        <input type="password" class="form-control" id="pass" name="pass1" placeholder="Password">
                        <?= form_error('pass1','<small class="text-danger pl-3">','</small> '); ?>
                        </div>  

                        <div class="form-group">
                        
                        <input type="password" class="form-control" id="pass" name="pass2" placeholder="Repeat Password">
                        </div>                         
                        <div class="form-group">
                        <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>