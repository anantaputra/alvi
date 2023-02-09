@extends('layouts.app', ['titlePage' => 'Dashboard Transaksi User'])

@section('content-page')
    <div class="container-fluid mt-3" style="padding: 100px 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Transaksi Pemesanan</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-transactions" style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Status Kirim</th>
                                    <th scope="col">Resi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                                </thead>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        // Datatables
        var datatable = $('#table-transactions').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url()->current() !!}',
                type: 'GET',
            },

            columns: [
                {
                    "data": "id", "name": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'total_price',
                    name: 'total_price'
                },

                {
                    data: 'status_pengiriman',
                    name: 'status_pengiriman'
                },
                {
                    data: 'resi',
                    name: 'resi'
                },
                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action',
                    name: 'action'
                },

            ],
            columnDefs: [
                {
                    "targets": 0, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 1, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 2, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 3, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 4, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 5, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 6, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 7, // your case first column
                    "className": "text-left",
                },

            ]
        });

    </script>
@endpush
