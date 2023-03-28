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
                    <h1>Transaksi Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi Barang</li>
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
                    <form id="formTransaksiBarang">
                        <div class="form-group row ml-5">
                            <label for="id" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
                            </div>

                            <label for="tgl" class="col-md-2 ml-2 mr-4 col-form-label">Tanggal Beli</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl" required>
                            </div>
                        </div>

                        <div class="form-group row ml-5">
                            <label for="namaBarang" class="col-md-2 col-form-label">Nama Barang</label>
                            <div class="col-md-3 mr-1">
                                <select name="namaBarang" id="namaBarang" required>
                                    <option value=""></option>
                                    <option value="Detergen">Detergen</option>
                                    <option value="Pewangi">Pewangi</option>
                                    <option value="Detergen Sepatu">Detergen Sepatu</option>
                                </select>
                            </div>

                            <label for="harga" class="col-md-2 ml-1 mr-4 col-form-label">Harga Barang:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="harga" name="harga" readonly>
                            </div>
                        </div>

                        <div class="form-group row ml-5">
                            <label for="qty" class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="qty" name="qty" min="0" step="1" value="0"
                                    required>
                            </div>

                            <label for="jenisPembayaran" class="col-md-2 ml-2 mr-5 col-form-label"> Jenis Pembayaran
                            </label>
                            <div class="form-check col-md-1">
                                <input class="form-check-input" type="radio" value="Cash" name="jenisPembayaran"
                                    id="filter">
                                <label class="form-check-label" for="jenisPembayaranCash">Cash</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="E-Money/Transfer"
                                    name="jenisPembayaran" id="filter">
                                <label class="form-check-label" for="jenisPembayaranElektronik">E-Money/Transfer</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 ml-3 col-form-label"></label>
                            <div class="col-md-6 ml-4">
                                <button class="btn btn-info float-right" id="btn-insert" type="button">SIMPAN</button>
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
                            <input type="search" class="form-control col-md-2" id="teks-cari">
                            <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                            {{-- <input type="checkbox" id="cash" value="Cash">Cash
                            <input type="checkbox" id="emoney" value="E-Money/Transfer">E-Money/Transfer --}}
                    </div>
                    <table class="table table-compact table-bordered table-hover" id="tblTransaksiBarang">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                                <th>Jenis Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" align="center">Belum ada data</td>
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
        const data = $('#formTransaksiBarang').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function (item, index) {
            let name = item['name']
            let value = name === 'id' || name === 'qty' || name === 'harga' ? Number(item['value']) : item[
                'value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataTransaksiBarang', JSON.stringify([...dataTransaksiBarang, newData]))
        return newData
    }

    let dataTransaksiBarang = JSON.parse(localStorage.getItem('dataTransaksiBarang')) || []
    $('#tblTransaksiBarang tbody').html(showData(dataTransaksiBarang))

    function showData(arr) {
        let row = ''

        if (arr.length == 0) {
            return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
        }

        let jmlHarga = jmlQty = totalHarga = jmlDiskon = jmlTotal = 0
        arr.forEach(function (item, index) {
            jmlHarga = Number(item['harga']) * Number(item['qty'])
            let diskon = jmlHarga >= 50000 ? jmlHarga * 0.15 : 0
            let total = jmlHarga - diskon
            jmlQty += item['qty']
            jmlDiskon += diskon
            jmlTotal += total
            totalHarga += item['harga']

            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['tgl']}</td>`
            row += `<td>${item['namaBarang']}</td>`
            row += `<td>${Number(item['harga'])}</td>`
            row += `<td>${item['qty']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${total}</td>`
            row += `<td>${item['jenisPembayaran']}</td>`
            row += `</tr>`
        })

        row += '<tr style="font-weight:bold;background:#efefef;color:#000;">'
        row += `<td colspan="3" class="text-center">TOTAL</td>`
        row += `<td>${totalHarga}</td>`
        row += `<td>${jmlQty}</td>`
        row += `<td>${jmlDiskon}</td>`
        row += `<td>${jmlTotal}</td>`
        row += '</tr>'

        return row
    }

    //event klik input data
    $('#btn-insert').on('click', function (e) {
        e.preventDefault()
        dataTransaksiBarang.push(insertData(dataTransaksiBarang))
        $('#tblTransaksiBarang tbody').html(showData(dataTransaksiBarang))
    })

    //event ambil nilai dari select, otomatisasi harga

    $('#namaBarang').on('change', function(){
        let namaBarang = $('#namaBarang').val();
        let harga = 0;
        switch (namaBarang) {
            case "Detergen": harga = 15000; break;
            case "Pewangi": harga = 10000; break;
            case "Detergen Sepatu": harga = 25000; break;
        
            default: harga = 0; break;
        }
        $('#harga').val(harga);
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
        dataTransaksiBarang = sorting(dataTransaksiBarang, 'id')
        localStorage.setItem('dataTransaksiBarang', JSON.stringify(dataTransaksiBarang))
        $('#tblTransaksiBarang tbody').html(showData(dataTransaksiBarang))
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
        let id = searching(dataTransaksiBarang, 'id', teksSearch)
        let data = []
        if (id >= 0)
            data.push(dataTransaksiBarang[id])
        console.log(id)
        console.log(data)
        $('#tblTransaksiBarang tbody').html(showData(data))
    })

    // Filter data Cash/E-Money
    // function filter(arr, cash, emoney) {
    //     let arrayData = []
    //     if (arr[0].constructor !== Object) {
    //         // console.log('1');
    //         return false
    //     }

    //     if (cash === null) {
    //         arr.forEach(function (item, index) {
    //             if (item['jenisPembayaran'] === 'E-Money/Transfer') {
    //                 let data = {}
    //                 data['harga'] = item['harga']
    //                 data['id'] = item['id']
    //                 data['jenisPembayaran'] = item['jenisPembayaran']
    //                 data['jumlah'] = item['jumlah']
    //                 data['namaBarang'] = item['namaBarang']
    //                 data['tgl'] = item['tgl']
    //                 data['diskon'] = item['diskon']
    //                 data['total'] = item['total']

    //                 arrayData.push(data)
    //             }
    //         })
    //     } else if (emoney === null) {
    //         arr.forEach(function (item, index) {
    //             if (item['jenisPembayaran'] === 'Cash') {
    //                 let data = {}
    //                 data['harga'] = item['harga']
    //                 data['id'] = item['id']
    //                 data['jenisPembayaran'] = item['jenisPembayaran']
    //                 data['jumlah'] = item['jumlah']
    //                 data['namaBarang'] = item['namaBarang']
    //                 data['tgl'] = item['tgl']
    //                 data['diskon'] = item['diskon']
    //                 data['total'] = item['total']

    //                 arrayData.push(data)
    //             }
    //         })
    //         return arrayData
    //     } else {
    //         return arr
    //     }
    // }

    //event click filter
    $('[id=filter]').on('click', function () {
        let cash = $('#cash').is(':checked') ? 'cash' : null
        let emoney = $('#e-money').is(':checked') ? 'e-money' : null
        data = filter(JSON.parse(localStorage.getItem('dataTransaksiBarang')), cash, emoney)
        $('#tblTransaksiBarang tbody').html(showData(data))
    })
</script>
@endpush