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
                    <h1>Simulasi Gaji Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Simulasi Gaji Karyawan</li>
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
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Form</h3>
                </div>
                <div class="card-body">
                    <form id="formKaryawan">
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jk" class="col-sm-4 col-form-label"> Jenis Kelamin</label>
                            <div class="form-check col-sm-3">
                                <input class="form-check-input" type="radio" value="L" name="jk" id="jkl">
                                <label class="form-check-label" for="jkl"> Laki-Laki</label>
                            </div>
                            <div class="form-check col-sm-3">
                                <input class="form-check-input" type="radio" value="P" name="jk" id="jkp">
                                <label class="form-check-label" for="jkp">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gaji" class="col-sm-4 col-form-label">Gaji</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="gaji" name="gaji" min="100000"
                                    step="50000" value="1000000" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lembur" class="col-sm-4 col-form-label">Lembur</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="lembur" name="lembur" value="0" min="0"
                                    step="1" required>
                                &nbsp;Hari
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button class="btn btn-info text-center" id="btn-insert" type="button">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Data</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-1">
                            <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>
                        </div>
                        <div class="col-md-1"></div>
                            <input type="search" class="form-control col-md-1" id="teks-cari">
                            <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                    </div>
                    <table class="table table-compact table-bordered table-hover" id="tblKaryawan">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis kelamin</th>
                                <th>alamat</th>
                                <th>Gaji</th>
                                <th>Lembur</th>
                                <th>Bonus</th>
                                <th>Pajak</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" align="center">Belum ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{--  --}}
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
@endsection

@push('script')
<script>
    const hargaLembur = 100000

    function insertData() {
        const data = $('#formKaryawan').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function (item, index) {
            let name = item['name']
            let value = name === 'id' || name == 'gaji' || name == 'lembur' ? Number(item['value']) : item[
                'value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataKaryawan', JSON.stringify([...dataKaryawan, newData]))
        return newData
    }

    let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
    $('#tblKaryawan tbody').html(showData(dataKaryawan))

    function showData(arr) {
        let row = ''

        if (arr.length == 0) {
            return row = `<tr><td colspan="9" align="center">Belum ada data</td></tr>`
        }

        let jmlGaji = jmlLembur = jmlTotal = jmlBonus = jmlPajak = 0
        arr.forEach(function (item, index) {
            let bonus = item['lembur'] >= 5 ? item['gaji'] * 0.5 : 0
            let pajak = item['gaji'] * 0.1
            let total = item['gaji'] + (item['lembur'] * hargaLembur) + bonus - pajak
            jmlGaji += item['gaji']
            jmlLembur += item['lembur']
            jmlBonus += bonus
            jmlPajak += pajak
            jmlTotal += total

            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['jk']}</td>`
            row += `<td>${item['alamat']}</td>`
            row += `<td>${item['gaji']}</td>`
            row += `<td>${item['lembur']}</td>`
            row += `<td>${bonus}</td>`
            row += `<td>${pajak}</td>`
            row += `<td>${total}</td>`
            row += `</tr>`
        })

        row += '<tr style="font-weight:bold;background:#efefef;color:#000">'
        row += `<td colspan="4" class="text-center">JUMLAH TOTAL</td>`
        row += `<td>${jmlGaji}</td>`
        row += `<td>${jmlLembur}</td>`
        row += `<td>${jmlBonus}</td>`
        row += `<td>${jmlPajak}</td>`
        row += `<td>${jmlTotal}</td>`
        row += '</tr>'

        return row
    }

    //event klik input data
    $('#btn-insert').on('click', function (e) {
        e.preventDefault()
        dataKaryawan.push(insertData(dataKaryawan))
        $('#tblKaryawan tbody').html(showData(dataKaryawan))
    })

    function sorting(arr, key) {
        let i, j, id, value;
        for (i = 1; i < arr.length; i++) {
            value = arr[i];
            id = arr[i][key]
            j = i - 1;
            while (j >= 0 && arr[j][key] > id) {
                arr[j + 1] = arr[j];
                j = j - 1;
            }
            arr[j + 1] = value;
        }
        return arr
    }

    //event klik sorting
    $('#btn-sorting').on('click', function () {
        dataKaryawan = sorting(dataKaryawan, 'id')
        localStorage.setItem('dataKaryawan', JSON.stringify(dataKaryawan))
        $('#tblKaryawan tbody').html(showData(dataKaryawan))
    })

    function searching(arr, key, teks) {
        for (let i = 0; i < arr.length; i++) {
            if (arr[i][key] == teks)
                return i
        }
        return -1
    }

    //event klik searching
    $('#btn-search').on('click', function () {
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataKaryawan, 'id', teksSearch)
        let data = []
        if (id >= 0)
            data.push(dataKaryawan[id])
        console.log(id)
        console.log(data)
        $('#tblKaryawan tbody').html(showData(data))
    })
</script>
@endpush