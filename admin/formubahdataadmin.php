<?php
    include "../koneksi.php";
    if(isset($_POST['update2'])){
        $SQL = $db->prepare("UPDATE tabel_pegawai SET password=? WHERE nip=?");

        $SQL->bind_param("si",$_POST['password'],$_POST['nip']);
        $SQL->execute();
        header("Location: keloladataadmin.php");
    }
?>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Admin</h4>
        </div>

        <form action="formubahdataadmin.php" method="post" >
        <input type="hidden" name="nip" value="<?php echo $row['NIP']?>"></input>

        <div class="modal-body">
            <div class="box-body">
                <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label >NIP</label><br>
                        <input type="text" value="<?php echo $row['NIP'];?>" class="form-control" name="nip" placeholder="Masukkan NIP" style="width: 90%;" maxlength="18" minlength="18" required disabled>
                        </div>
                    <div class="form-group">
                    <br>
                    <label >Password</label> <br>
                    <input type="text" value="<?php echo $row['PASSWORD'];?>" class="form-control" name="password" placeholder="Masukkan Password" required style="width: 50%;">
                    </div>
                      </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Tutup</button>
        <button type="submit" name="update2" value="update2" class="btn btn-primary pull-left">Simpan</button>
        </div>

        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->