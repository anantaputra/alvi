@extends('layouts.admin', ['title' => 'Dashboard Admin'])

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaksi Pemesanan</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-cart-plus"></i> Informasi Transaksi {{ $transaction->code }}</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.transactions.update',$transaction->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label class="col-sm-3">Nama Penerima</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ old('name',$transaction->name) }}"
                                                   placeholder="Masukkan Name" readonly
                                                   class="form-control @error('name') is-invalid @enderror">

                                            @error('name')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3">No Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone"
                                                   value="{{ old('phone',$transaction->phone) }}"
                                                   placeholder="Masukkan Phone" readonly
                                                   class="form-control @error('phone') is-invalid @enderror">

                                            @error('phone')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3">Alamat Pengiriman</label>
                                        <div class="col-sm-9">
                                            <textarea name="address" id="address" class="form-control"
                                                      placeholder="Masukan address" cols="30" readonly
                                                      rows="3"> {{ old('address',strip_tags($transaction->address)) }}</textarea>

                                            @error('address')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <h6 class="col-sm-9 offset-3"> Data Barang</h6>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        @foreach ($transaction->transaction_details as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ moneyFormat($item->price) }}</td>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3">Total</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="total_price"
                                                   value="{{ old('total_price',moneyFormat($transaction->total_price)) }}"
                                                   placeholder="Masukkan Total" readonly
                                                   class="form-control @error('total_price') is-invalid @enderror">

                                            @error('total_price')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-3">No Resi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="resi" value="{{ old('resi',$transaction->resi) }}"
                                                   class="form-control @error('resi') is-invalid @enderror"
                                                   placeholder="Masukan No Resi">
                                            @error('resi')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-3">Status Pengiriman</label>
                                        <div class="col-sm-9">
                                            <select name="status_pengiriman" id="status"
                                                    class="form-control @error('status_pengiriman') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                <option value="PENDING" {{ $transaction->status_pengiriman == 'PENDING' ? 'selected' : '' }}>
                                                    PENDING
                                                </option>
                                                <option value="SUCCESS" {{ $transaction->status_pengiriman == 'SUCCESS' ? 'selected' : '' }}>
                                                    SUCCESS
                                                </option>
                                                <option value="SHIPPING" {{ $transaction->status_pengiriman == 'SHIPPING' ? 'selected' : '' }}>
                                                    SHIPPING
                                                </option>
                                                <option value="CANCEL" {{ $transaction->status_pengiriman == 'CANCEL' ? 'selected' : '' }}>
                                                    CANCEL
                                                </option>
                                            </select>
                                            @error('status_pengiriman')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3">Status Pembayaran</label>
                                        <div class="col-sm-9">
                                            <select name="status" id="select"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="success" {{ $transaction->status == 'success' ? 'selected' : '' }}>
                                                    Success
                                                </option>
                                                <option value="failed" {{ $transaction->status == 'failed' ? 'selected' : '' }}>
                                                    Failed
                                                </option>
                                            </select>

                                            @error('status')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <button class="btn btn-primary offset-3 mr-1 btn-submit" type="submit"><i
                                                    class="fa fa-paper-plane"></i>Simpan
                                        </button>
                                        <a class="btn btn-warning btn-reset"
                                           href='{{ route('admin.transactions.index') }}'><i
                                                    class="fa fa-arrow-left"></i> Kembali</a>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>

    <script>
        //active select2
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });
        var editor_config = {
            selector: "textarea.address",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init(editor_config);
    </script>


@endpush

