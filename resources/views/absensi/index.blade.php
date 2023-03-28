@extends('template.layout')

@push('style')
@endpush

@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absensi Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Absensi Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalFormAbsen">
                Tambah Data
            </button>

            @include('absensi.data')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{--  --}}
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('absensi.form')
</section>
@endsection

@push('script')
<script>
    $('#data-absen').DataTable();

    $('.alert-success').fadeTo(2000, 500).slideUp(500, function () {
        $('.alert-success').slideUp(500)
    })

    $('.remove').on('click', function () {
        const data = $(this).closest('tr').find('td:eq(1)').text()

        $('#data-delete').text(data)

        const form = $(this).closest('tr').find('form')
        $('#btn-confirm').on('click', function(){
        form.submit()
        })
    })

    // Update or Input
    $('#modalFormAbsen').on('show.bs.modal', function(e){
        const btn = $(e.relatedTarget)
        const modal = $(this)
        const mode = btn.data('mode')
        const id = btn.data('id')
        const namaKaryawan = btn.data('nama_karyawan')
        const tanggalMasuk = btn.data('tanggal_masuk')
        const waktuMasuk = btn.data('waktu_masuk')
        const status = btn.data('status')
        const waktuKeluar = btn.data('waktu_keluar')

        if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data')
            modal.find('#namaKaryawan').val(namaKaryawan)
            modal.find('#tanggalMasuk').val(tanggalMasuk)
            modal.find('#waktuMasuk').val(waktuMasuk)
            modal.find('#status').val(status)
            modal.find('#waktuKeluar').val(waktuKeluar)
            modal.find('#method').html('@method("PATCH")')
            modal.find('form').attr('action',`{{ url('absensi') }}/${id}`)
        }else{
            modal.find('.modal-title').text('Form Absen')
            modal.find('#namaKaryawan').val('')
            modal.find('#tanggalMasuk').val('')
            modal.find('#waktuMasuk').val('')
            modal.find('#status').val('')
            modal.find('#waktuKeluar').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action','{{ url('absensi') }}')
        }
    })

    $('#modalFormAbsen').on('shown.bs.modal', function(){
        $('#namaKaryawan').delay(1000).focus().select();
        $('#tangalMasuk').delay(1000).focus().select();
        $('#waktuMasuk').delay(1000).focus().select();
        $('#status').delay(1000).focus().select();
        $('#waktuKeluar').delay(1000).focus().select();
    })
</script>
@endpush