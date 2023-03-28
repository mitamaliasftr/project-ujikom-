<!-- Modal -->
<div class="modal fade" id="modalFormAbsen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="absensi">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="namaKaryawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" value="" placeholder="Nama Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggalMasuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" value="" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktuMasuk" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuMasuk" name="waktuMasuk" value="" placeholder="Waktu Masuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                        <select class="col-lg" name="status" id="status">
                                <option value="Masuk">Masuk</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktuKeluar" class="col-sm-4 col-form-label">Waktu Keluar</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="waktuKeluar" name="waktuKeluar" value="" placeholder="Waktu Keluar">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>