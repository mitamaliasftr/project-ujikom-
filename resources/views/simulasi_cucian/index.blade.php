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
                    <h1>Simulasi Cucian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Simulasi Cucian</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">simulasi cucian</h3>

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
            {{--  --}}
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
    function insertData(dataCucian) {
        const data = $('#form-cucian').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function (item, index) {
            let name = item['name']
            let value = name === 'id' ? Number(item['berat']) : item['value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
        return newData
    }
    // event klik input data
    $('#btn-insert').on('click', function () {
        dataCucian.push(insertData(dataCucian))
        $('#data-cucian tbody').html(showData(dataCucian))
    })

    function showData(arr) {
        let row = ''
        if (arr.length == null) {
            return row = `<tr><td colspan="6">Belum ada data</td></tr>`
        }
        let jmlBerat = jmlDiskon = jmlTotal = jmlBonus = jmlPajak = 0
        arr.forEach(function (item, index) {
            let harga = item['JenisCucian'] == 'standar' ? 7500 : 10000
            let jmlHarga = harga * item['berat']
            let diskon = jmlHarga >= 50000 ? harga * 0.1 : 0
            let total = jmlHarga - diskon

            jmlBerat += item['berat']
            jmlDiskon += diskon
            jmlTotal += total


            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['nophone']}</td>`
            row += `<td>${item['tgl']}</td>`
            row += `<td>${item['jenisCucian']}</td>`
            row += `<td>${item['berat']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${total}</td>`
            row += `</tr>`

        })
        row += `<tr style="font-weight:bold; background:#0F23DD;color:white;">`
        row += `<td colspan="5">Jumlah total</td>`
        row += `<td></td>`
        row += `<td>${jmlBerat}</td>`
        row += `<td>${jmlDiskon}</td>`
        row += `<td>${jmlTotal}</td>`
        row += `</tr>`
        return row
    }
</script>
@endpush