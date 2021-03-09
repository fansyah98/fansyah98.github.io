<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title"><?= $title?></h3>
            <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">

            <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i> ';
                    echo $this->session->flashdata('pesan');
                    echo '</h6></div>';
                }
            ?>

            <table class="table table-bordered" id="table2">
                <thead class="text-center">
                    <th>no</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($user as $Kamusayang => $data) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data->name_user?></td>
                    <td><?= $data->username?></td>   
                    <td><?= $data->password?></td>
                    <td>
                        <?php
                        if ($data->level_user == 1 ) 
                        {
                           echo'<span class="badge bg-danger">Admin</span>';
                        }else{
                            echo'<span class="badge bg-primary">User</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <button type="button" id="edit<?=$data->id_user?>"class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target=".halo<?=$data->id_user?>"><i class="fa fa-edit"></i></button>
                        <button type="button" id="delete<?=$data->id_user?>"class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target=".delete<?=$data->id_user?>"><i class="fa fa-trash"></i></button>
                    </td>                  
                </tr>
              <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>


<!---------------------------------------Modal Tambah Data-------------------------------------------->
<!---modal tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-warning">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <?php
            echo 
            form_open('user/add');        
        ?>

        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" name="name_user" placeholder="Nama Lengkap User" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="username" class="form-control" name="username" placeholder="Username  " required>
        </div>

        <div class="form-group">
            <label>password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label>level User </label>
            <select name="level_user" class="form-control">
                <option value="1" selected>Admin</option>
                <option value="2">User</option>
            </select>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm btn-xns">Save changes</button>
    </div>      
    <?php 
        echo
        form_close();
    ?>
</div>
</div>
</div>
<!---modal tambah data -->
<!---------------------------------------Modal Tambah Data-------------------------------------------->


<!---------------------------------------Edit Data user -------------------------------------------->
<!--modal edit data -->
<?php 
foreach($user as $Kamusayang =>$data) { ?>
<div class="modal fade halo<?=$data->id_user?>"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-info">
     <div class="modal-header" >
        <h5 class="modal-title" >Edit <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
     <?php
            echo 
            form_open('user/edit/'.$data->id_user);        
        ?>

        <div class="form-group">
            <label>Nama User</label>
            <input type="text" class="form-control" value="<?=$data->name_user?>" name="name_user" placeholder="Nama Lengkap User" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="username" class="form-control" value="<?=$data->username?>" name="username" placeholder="Username  " required>
        </div>

        <div class="form-group">
            <label>password</label>
            <input type="passwrod" class="form-control" value="<?=$data->password?>"name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label>level User </label>
            <select name="level_user" class="form-control">
                <option value="1
                        <?php if($data->level_user==1)
                        {echo 'selected ';}?>">Admin
                 </option>
                <option value="2
                    <?php if($data->level_user==2)
                    {echo 'selected';}?>">User</option>
            </select>
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm btn-xns">Save changes</button>
        </div>

      </div>
    </div>
  </div>
</div>
<?php
echo 
form_close();
?>
<?php } ?>
<!--modal edit data -->
<!---------------------------------------Modal edit data-------------------------------------------->


<!-------------------------------------------------hapus data modal------------------------------------------------>
<?php 
foreach($user as $Kamusayang =>$data) { ?>
<div class="modal fade delete<?=$data->id_user?>"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-info">
     <div class="modal-header" >
        <h5 class="modal-title" >Delete <?= $data->name_user?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
         <span>apakah anda mau menghapusnya ??</span>
     </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger btn-sm btn-xns" data-dismiss="modal">Close</button>
            <a href="<?=base_url('user/delete/'. $data->id_user)?>" class="btn btn-success btn-sm btn-xns">Delete Data</a>
        </div>
      </div>
    </div>
  </div>
<?php
echo 
form_close();
?>
<?php } ?>
<!-------------------------------------------------hapus data modal------------------------------------------------>