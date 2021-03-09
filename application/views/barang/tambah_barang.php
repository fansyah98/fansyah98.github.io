<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online | Shop</title>
</head>
<body>
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><?= $title?></h3>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            <?php 
                echo validation_errors('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
                <h5> <i class="icon fa fa-info"> </i>', '</h5> </div>');
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
                    <h5>Silakan Upload ulang <i class="icon fa fa-info"> </i>'.$error_upload.'</h5> </div>';
                }
                 echo form_open_multipart('barang/add');

            ?>
           
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="<?= set_value('nama_barang')?>"  >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Stock Barang</label>
                        <input type="number" name="stok_barang"class="form-control" value="<?= set_value('stok_barang')?>" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" name="harga" class="form-control" value="<?= set_value('harga')?>"  >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control" >
                        <option value="">pilih kategori</option>
                        <?php foreach($kategori as $kamudanaku => $data) { ?>
                            <option value="<?=$data->id_kategori?>"><?=$data->nama_kategori?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" cols="20" rows="5" class="form-control" placeholder="silakan isi deskripsi di sini" value="<?= set_value('deskripsi')?>" ></textarea>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Masukan Gambar</label>
                        <input type='file' id="img" name="gambar" class="form-control"  />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img id="preview" src="<?=base_url()?>assest/images/gambar/download.jpeg" alt="your image" width="100px"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="<?=base_url('barang')?>" class="btn btn-primary btn-sm btn-flat" >
                    <i class="fa fa-undo">Kembali</i>
                </a>
                    <button type="submit" class="btn btn-danger btn-sm btn-flat" >
                        <i class="fa fa-paper-plane">Save Data </i>
                </button>
            </div>

            <?php echo form_close(); ?>
        </div>
     </div>
 </div>
</body>
</html>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#img").change(function() {
    readURL(this);
});
</script>