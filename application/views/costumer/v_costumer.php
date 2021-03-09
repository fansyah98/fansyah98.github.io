<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><?= $title?></h3>
            <div class="card-tools">
                <a href="<?=base_url('costumer/add')?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            
        <table class="table table-bordered" id="table2">
                    <thead class="text-center">
                        <tr>
                             <th>No</th>
                             <th>nama costumer</th>
                             <th>Kecamatan</th>
                             <th>Kabupaten</th>
                             <th>kota</th>
                             <th>Email</th>
                             
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php 
                        $no = 1 ;
                         foreach($costumer as $akukamu => $data ) { ?> 
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$data->Nama_costumer?></td>
                                <td><?=$data->kecamatan?></td>
                                <td><?=$data->kabupaten?></td>
                                <td><?=$data->kota?></td>
                                <td><?=$data->email?></td>
                              
                            </tr>
                         <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>