<div class="mt-3">
    <table class="table table-hover table-compact" id="data-absen">
        <thead>
            <tr>
                <th >No.</th>
                <th >Nama Karyawan</th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Status</th>
                <th>Waktu Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($absensi as $a)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $a->namaKaryawan }}</td>
                <td>{{ $a->tanggalMasuk }}</td>
                <td>{{ $a->waktuMasuk }}</td>
                <td>{{ $a->status }}</td>
                <td>{{ $a->waktuKeluar }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalFormAbsen"
                        data-mode="edit" 
                        data-id="{{ $a->id }}" 
                        data-nama_karyawan="{{ $a->namaKaryawan }}"
                        data-tanggal_masuk="{{ $a->tanggalMasuk }}"
                        data-waktu_masuk="{{ $a->waktuMasuk }}"
                        data-status="{{ $a->status }}"
                        data-waktu_keluar="{{ $a->waktuKeluar }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <form action="{{ route('absensi.destroy', $a->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger remove" data-toggle="modal"
                            data-target="#confirmDialog">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Konfirmasi Delete -->
<div class="modal fade" id="confirmDialog" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah data <b id="data-delete"></b> akan dihapus?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btn-confirm">Hapus</button>
            </div>
        </div>
    </div>
</div>