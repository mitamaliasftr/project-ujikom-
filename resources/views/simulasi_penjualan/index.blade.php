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
                    <h1>Simulasi Penjualan Baju Polos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Simulasi Penjualan Baju Polos</li>
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
                    <form id="formPenjualan">
                        <div class="form-group row ml-5">
                            <label for="id" class="col-md-2 col-form-label">No. Transaksi</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
                            </div>

                            <label for="tgl" class="col-md-2 ml-2 mr-4 col-form-label">Tanggal Beli</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl" required>
                            </div>
                        </div>

                        <div class="form-group row ml-5">
                            <label for="warna" class="col-md-2 col-form-label">Warna</label>
                            <div class="col-md-3 mr-1">
                                <select name="warna" id="warna" required>
                                    <option value=""></option>
                                    <option value="Merah">Merah</option>
                                    <option value="Kuning">Kuning</option>
                                    <option value="Biru">Biru</option>
                                    <option value="Putih">Putih</option>
                                    <option value="Hitam">Hitam</option>
                                </select>
                            </div>

                            <label for="harga" class="col-md-2 ml-1 mr-4 col-form-label">Ukuran</label>
                            <div class="col-md-3">
                            <select name="ukuran" id="ukuran">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row ml-5">
                            <label for="pcs" class="col-md-2 col-form-label">Jumlah Beli</label>
                            <div class="col-md-3">
                                <input type="number" class="form-control col-md-4" id="pcs" name="pcs" min="0" step="1" value="0"
                                    required>
                            </div>

                            <label for="nama" class="col-md-2 ml-1 mr-4 col-form-label">Nama Pembeli</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pembeli">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 ml-5">
                                <button class="btn btn-info float-left" id="btn-insert" type="button">INPUT</button>
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
                        <input type="search" class="form-control col-sm-2" name="search" id="search">
                        <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>
                        </div>
                    </div>
                    <table class="table table-compact table-bordered table-hover" id="tblPenjualan">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Beli</th>
                                <th>Warna Baju</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Nama Pembeli</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
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
    function insertData() {
        const data = $('#formPenjualan').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function (item, index) {
            let name = item['name']
            let value = name === 'id' ||
                        name === 'harga' || 
                        name === 'pcs' ||
                        name === 'diskon' 
                        ? Number(item['value']) : item[
                'value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataPenjualan', JSON.stringify([...dataPenjualan, newData]))
        return newData
    }

    let dataPenjualan = JSON.parse(localStorage.getItem('dataPenjualan')) || []
    $('#tblPenjualan tbody').html(showData(dataPenjualan))

    function showData(arr) {
        let row = ''

        if (arr.length == 0) {
            return row = `<tr><td colspan="9" align="center">Belum ada data</td></tr>`
        }

        let jmlHarga = jmlPcs = totalHarga = jmlDiskon = jmlTotal = 0
        arr.forEach(function (item, index) {
            let harga = item['ukuran'] == 'S' ? 25000 : item['ukuran'] == 'M' ? 30000 : 35000
            jmlHarga = harga * item['pcs']
            let diskon = item['pcs'] >= 10 ? jmlHarga * 0.10 : 0
            let total = jmlHarga - diskon
            jmlPcs += item['pcs']
            jmlDiskon += diskon
            jmlTotal += harga
            totalHarga += harga

            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['tgl']}</td>`
            row += `<td>${item['warna']}</td>`
            row += `<td>${item['ukuran']}</td>`
            row += `<td>${harga}</td>`
            row += `<td>${item['pcs']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${total}</td>`
            row += `</tr>`
        })

        row += '<tr style="font-weight:bold;background:#efefef;color:#000;">'
        row += `<td colspan="4" class="text-center">TOTAL</td>`
        row += `<td>${totalHarga}</td>`
        row += `<td>${jmlPcs}</td>`
        row += `<td></td>`
        row += `<td>${jmlDiskon}</td>`
        row += `<td>${jmlTotal}</td>`
        row += '</tr>'

        return row
    }

    //event klik input data
    $('#btn-insert').on('click', function (e) {
        e.preventDefault()
        dataPenjualan.push(insertData(dataPenjualan))
        $('#tblPenjualan tbody').html(showData(dataPenjualan))
    })

    // algoritma untuk sorting
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
        dataPenjualan = sorting(dataPenjualan, 'id')
        localStorage.setItem('dataPenjualan', JSON.stringify(dataPenjualan))
        $('#tblPenjualan tbody').html(showData(dataPenjualan))
    })

    // algoritma untuk searching
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
        let id = searching(dataPenjualan, 'id', teksSearch)
        let data = []
        if (id >= 0)
            data.push(dataPenjualan[id])
        console.log(id)
        console.log(data)
        $('#tblPenjualan tbody').html(showData(data))
    })
</script>
@endpush