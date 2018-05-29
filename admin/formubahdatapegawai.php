<?php
    include "../koneksi.php";
    if(isset($_POST['update2'])){
        $SQL = $db->prepare("UPDATE tabel_user SET nama=?, pangkat_golongan=?, jabatan=?, unit_kerja=?, status=? WHERE nip=?");
        $SQL->bind_param("sssssi",$_POST['nama'],$_POST['pangkat_golongan'],$_POST['jabatan'],$_POST['unit_kerja'],$_POST['status'],$_POST['nip']);
        $SQL->execute();
        header("Location: keloladatapegawai.php");
    }
?>

<div class="modal fade" id="modal-default<?php echo $row['NIP']; ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Pegawai</h4>
        </div>

        <form action="formubahdatapegawai.php" method="POST" >
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
                    <label >Nama</label> <br>
                    <input type="text" value="<?php echo $row['NAMA'];?>" class="form-control" name="nama" placeholder="Masukkan Nama" required style="width: 170%;">
                    </div>
                    <div class="form-group"> <br>
                    <label >Pangkat/Gol. Ruang</label> <br>
                    <select name="pangkat_golongan" class="form-control" style="width: 115%;" REQUIRED>
                        <option value="" >- Pilih Pangkat/Gol. Ruang -</option>
                        <option value="Pembina Utama / (IV/e)" >Pembina Utama / (IV/e)</option>
                        <option value="Pembina Utama Madya / (IV/d)" >Pembina Utama Madya / (IV/d)</option>
                        <option value="Pembina Utama Muda / (IV/c)" >Pembina Utama Muda / (IV/c)</option>
                        <option value="Pembina Tingkat I / (IV/b)" >Pembina Tingkat I / (IV/b)</option>
                        <option value="Pembina / (IV/a)" >Pembina / (IV/a)</option>
                        <option value="Penata Tingkat I / (III/d)" >Penata Tingkat I / (III/d)</option>
                        <option value="Penata / (III/c)" >Penata / (III/c)</option>
                        <option value="Penata Muda Tingkat I / (III/b)" >Penata Muda Tingkat I / (III/b)</option>
                        <option value="Penata Muda / (III/a)" >Penata Muda / (III/a)</option>
                        <option value="Pengatur Tingkat I / (II/d)" >Pengatur Tingkat I / (II/d)</option>
                        <option value="Pengatur / (II/c)" >Pengatur / (II/c)</option>
                        <option value="Pengatur Muda Tingkat I / (II/b)" >Pengatur Muda Tingkat I / (II/b)</option>
                        <option value="Pengatur Muda / (II/a)" >Pengatur Muda / (II/a)</option>
                        <option value="Juru Tingkat I / (I/d)" >Juru Tingkat I / (I/d)</option>
                        <option value="Juru / (I/c)" >Juru / (I/c)</option>
                        <option value="Juru Muda Tingkat I / (I/b)" >Juru Muda Tingkat I / (I/b)</option>
                        <option value="Juru Muda / (I/a)" >Juru Muda / (I/a)</option>
                    </select>
                    </div>
                    <div class="form-group"> <br>
                    <label >Jabatan</label> <br>
                    <select name="jabatan" class="form-control" style="width: 130%;" required>
                        <option value="" >- Pilih Jabatan -</option>
                        <option value="Kepala Bidang APTIKA" >Kepala Bidang APTIKA</option>
                        <option value="Kepala Seksi Tata Kelola & Pemberdayaan TIK" >Kepala Seksi Tata Kelola & Pemberdayaan TIK</option>
                        <option value="Staff Seksi Tata Kelola & Pemberdayaan TIK" >Staff Seksi Tata Kelola & Pemberdayaan TIK</option>
                        <option value="Kepala Seksi Pengembangan Aplikasi" >Kepala Seksi Pengembangan Aplikasi</option>
                        <option value="Staff Seksi Pengembangan Aplikasi" >Staff Seksi Pengembangan Aplikasi</option>
                        <option value="Kepala Seksi Persandian dan Keamanan Informasi" >Kepala Seksi Persandian dan Keamanan Informasi</option>
                        <option value="Staff Seksi Persandian dan Keamanan Informasi" >Staff Seksi Persandian dan Keamanan Informasi</option>
                    </select>
                    </div>
                    <div class="form-group"> <br>
                    <label>Unit Kerja</label> <br>
                    <input type="text" class="form-control" name="unit_kerja" value="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" placeholder="Dinas Komunikasi dan Informatika Provinsi Jawa Timur" readonly="readonly" style="width: 200%;">
                    </div>
                    <div class="form-group"> <br>
                    <label >Status</label> <br>
                    <select name="status" class="form-control" style="width: 105%;" required>
                        <option value="" >- Pilih Status -</option>
                        <option value="Pegawai Yang Dinilai" >Pegawai Yang Dinilai</option>
                        <option value="Pejabat Penilai" >Pejabat Penilai</option>
                    </select>
                    </div>
                      </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Tutup</button>
        <button type="submit" name="update2" class="btn btn-primary pull-left">Simpan</button>
        </div>

        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->