<div class="container">
<?php if($this->session->flashdata() ):?>
<div style="position:fixed;top:75px;width:65%;left:0;right:0;margin:auto;" id="alertnya">
<div class="col-md-6">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sukses..!</strong> Data Mahasiswa <?= $this->session->flashdata('flash');?>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php endif;?>

<div class="row mt-4">
<div class="col-md-6">
<a href="<?= base_url();?>mahasiswa/tambah" class="btn btn-primary">Tambah Data</a>
</div>
</div>

<div class="row mt-3">
<div class="col-12">

<?php
if(empty($query_joinnya))
  {
  echo "<h3 class='alert alert-warning alert-dismissible fade show'>Data Mahasiswa Masih Kosong.</h3>";
  }
  else
  {
  echo "
  <h3>Daftar Mahasiswa</h3>
  <table class='table table-hover'>
  <thead>
    <tr>
      <th class='text-center'>No</th>
      <th class='text-center'>NIM</th>       
      <th class='text-center'>Nama</th>     
      <th class='text-center'>Fakultas</th>
      <th class='text-center'>Prodi</th>
      <th class='text-center'>Judul</th>
      <th class='text-center'>Foto</th>
      <th class='text-center'>Option</th>
    </tr>
  </thead>
  <tbody>";
    }

  
   $nurut=1; foreach($query_joinnya as $datafakultas):
   
    if(!empty($datafakultas['image']))
    {
      $fotonya = $datafakultas['image'];
    }
    else
    {
      $fotonya = "default.jpg";
    }
    ?> <!--samakan dengan variable di mahasiswa control-->

 <tr>
      <td class="align-middle text-center"><?=$nurut?></td>
      <td class="align-middle text-right"><?= $datafakultas['nim']?></td>
      <td class="align-middle"><?= $datafakultas['nama_mhs']?></td> 
      <td class="align-middle"><?= $datafakultas['nama_fakultas']?></td>
      <td class="align-middle"><?= $datafakultas['nama_prodi']?></td>
      <td class="align-middle"><?= $datafakultas['id_judul']?></td>
      <td class="align-middle text-center" style="display:block;padding:0;">
      <img width="55" height="55" src="<?= base_url();?>img/<?= $fotonya?>">
      </td>
      <td class="align-middle text-center">
      <a href="<?= base_url('mahasiswa/editku/'.$datafakultas['nim'])?>" class="btn btn-sm btn-warning">Edit</a>
      <a id="hapus" href="<?= base_url()?>mahasiswa/hapusmhs/<?= $datafakultas['nim']?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data?');">Hapus</a>
      </td>
    </tr>
    <?php $nurut++; endforeach;?>
  </tbody>
</table>
</div>
</div>
</div>
