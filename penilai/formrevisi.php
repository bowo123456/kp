<?php
    include "../koneksi.php";
    if(isset($_POST['update2'])){
        $SQL = $db->prepare("UPDATE tabel_target_skp
        SET kegiatan_tugas_jabatan=?, kuantitas=?, output=?, kualitas=?, waktu=?, biaya=?, status='Konfirmasi'
        WHERE id_target=?");
        $SQL->bind_param("ssssssi",$_POST['kegiatan_tugas_jabatan'],$_POST['kuantitas'],$_POST['output'],$_POST['kualitas'],$_POST['waktu'],$_POST['biaya'],$_POST['id_target']);
        $SQL->execute();
        header("Location: detail.php?id=".$row['NIP']);
    }
?>

<div class="modal fade" id="modal-default<?php echo $row['ID_TARGET']; ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Sasaran Kerja Pegawai</h4>
        </div>
        <form action="formrevisi.php" method="POST" >
        <input type="hidden" name="id_target" value="<?php echo $row['ID_TARGET']?>"></input>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Kegiatan Tugas Jabatan</label>
                                <textarea class="form-control" rows="4" name="kegiatan_tugas_jabatan" placeholder="Masukkan kegiatan tugas jabatan ..." required="" value="<?php echo $row['KEGIATAN_TUGAS_JABATAN']; ?>"></textarea>
                            </div>
                            <div class="form-group"><br>
                                <label >Kuantitas</label><br>
                                <input type="number" class="form-control" required="" value="<?php echo $row['KUANTITAS']; ?>" name="kuantitas" style="width: 40%;">
                            </div>
                            <div class="form-group"><br>
                                <label >Output</label><br>
                                <select name="output" class="form-control" required style="width: 100%;">
                                    <option value="" >- Pilih Output -</option>
                                    <option value="Laporan" <?php if($row['OUTPUT']=='Laporan'){ echo "selected"; } ?>>Laporan</option>
                                    <option value="Dokumen" <?php if($row['OUTPUT']=='Dokumen'){ echo "selected"; } ?>>Dokumen</option>
                                </select>
                            </div>
                            <div class="form-group"><br>
                                <label >Kualitas</label><br>
                                <input type="number" class="form-control" required="" name="kualitas" value="<?php echo $row['KUALITAS']; ?>" style="width: 40%;">
                            </div>
                            <div class="form-group"><br>
                                <label >Waktu (bulan)</label><br>
                                <input type="number" required="" class="form-control" name="waktu" value="<?php echo $row['WAKTU']; ?>" style="width: 40%;">
                            </div>
                            <div class="form-group"><br>
                                <label >Biaya</label><br>
                                <input type="number" class="form-control" required="" name="biaya" value="<?php echo $row['BIAYA']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success pull-left" name="update2">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->