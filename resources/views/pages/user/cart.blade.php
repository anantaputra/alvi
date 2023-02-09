@extends('layouts.app', ['titlePage' => 'Ecommerce - Cart ' ])
@section('content-page')
    <!-- Page Content -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Keranjang Belanja
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-12 table-responsive">
                                <table
                                        class="table table-borderless table-cart"
                                        aria-describedby="Cart">
                                    <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $totalprice = 0 @endphp
                                    @forelse ($carts as $cart)
                                        <tr>
                                            <td>
                                                @if ($cart->product->galleries->count())
                                                    <img
                                                            src="{{url('storage/'.$cart->product->galleries->first()->photos)}}"
                                                            alt=""
                                                            class="cart-image"
                                                    />
                                                @endif
                                            </td>
                                            <td>
                                                <div class="product-title">{{$cart->product->name}}</div>
                                            </td>
                                            <td>
                                                <div class="product-title">{{ moneyFormat($cart->product->price)}}</div>
                                                <div class="product-subtitle"></div>
                                            </td>
                                            <td>
                                                <div class="product-title">{{$cart->quantity}} Pcs</div>
                                                <div class="product-subtitle"></div>
                                            </td>
                                            <td>
                                                <div
                                                        class="product-title">{{ moneyFormat($cart->product->price * $cart->quantity)}}</div>
                                                <div class="product-subtitle"></div>
                                            </td>
                                            <td>
                                                <form action="{{route('delete-cart',$cart->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger mt-1">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $totalprice += $cart->product->price * $cart->quantity @endphp
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="4">Tidak Produk</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <th></th>
                                        <th colspan="3">Total Harga Produk</th>
                                        <th>{{moneyFormat($totalprice)}}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pengiriman</h5>
                        <form action="{{ route('checkout') }}" method="POST" id="locations"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="total_price" id="total_price" value="{{$totalprice}}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6>Informasi Penerima</h6>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4">Nama Penerima</label>
                                                <div class="col-sm-8">
                                                    <input
                                                            type="text"
                                                            class="form-control col-sm-8"
                                                            id="name"
                                                            name="name"
                                                            value="{{$users->name}}"
                                                            required
                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group row mt-2">
                                                <label for="phone" class="col-sm-4"> No Telepon</label>
                                                <div class="col-sm-8">
                                                    <input
                                                            type="number"
                                                            class="form-control col-sm-8"
                                                            id="phone"
                                                            name="phone"
                                                            value="{{$users->phone }}"
                                                            required
                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group row mt-2">
                                                <label for="address" class="col-sm-4"> Alamat</label>
                                                <div class="col-sm-8">
                                                     <textarea name="address"
                                                               id="address"
                                                               class="form-control"
                                                               required
                                                               cols="30"
                                                               placeholder="Masukan Alamat Lengkap"
                                                               rows="4">{{ strip_tags($users->address) }}
                                                     </textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6>Tujuan Pengiriman</h6>
                                            <hr>

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4">Provinsi</label>
                                                <div class="col-sm-8">
                                                    <select
                                                            class="form-control provinsi-tujuan"
                                                            name="province_destination">
                                                        <option value="0">-- pilih provinsi tujuan --</option>
                                                        @foreach ($provinces as $province => $value)
                                                            <option value="{{ $province  }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-2">
                                                <label for="name" class="col-sm-4">Kota / Kabupaten</label>
                                                <div class="col-sm-8">
                                                    <select
                                                            class="form-control kota-tujuan"
                                                            name="city_destination">
                                                        <option value="0">-- pilih kota tujuan --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-2">
                                                <label for="servis" class="col-sm-4">Servis</label>
                                                <div class="col-sm-8">
                                                    <input
                                                            type="text"
                                                            class="form-control col-sm-8"
                                                            id="res_servis"
                                                            name="servis"
                                                            value=""
                                                            required
                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group row mt-2">
                                                <div class="col-sm-8 offset-4">
                                                    <button class="btn btn-primary btn-check">Pilih</button>
                                                </div>
                                            </div>


                                            <div class="form-group row mt-2">
                                                <label for="ongkir" class="col-sm-4">Biaya Kirim</label>
                                                <div class="col-sm-8">
                                                    <input
                                                            type="text"
                                                            class="form-control col-sm-8"
                                                            id="res_biaya"
                                                            name="ongkir"
                                                            required
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" data-aos="fade-up" data-aos-delay="150">
                                <div class="col-12">
                                    <hr/>
                                </div>
                                <div class="col-12">
                                    <h2>Informasi Pembayaran</h2>
                                </div>
                                <div class="col-12 row">
                                    <div class="col-sm-8">
                                        <h2>Total Biaya : </h2>
                                    </div>
                                     <div class="col-sm-4">
                                        <input
                                            type="text"
                                            class="form-control col-sm-8"
                                            id="total_all"
                                            name="total_all"
                                            required
                                            readonly
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="row" data-aos="fade-up" data-aos-delay="200">
                                <div class="col-8 col-md-3">
                                    @if(count($carts) > 0)
                                        <button
                                                type="submit"
                                                class="btn btn-primary mt-4 px-4 btn-block">
                                            Bayar
                                        </button>
                                    @endif
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            //active select2
            $(".provinsi-tujuan, .kota-tujuan").select2({
                theme: 'bootstrap4', width: 'style',
            });

            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function () {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/user/cities/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                            $.each(response, function (key, value) {
                                $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                }
            });

            //ajax check ongkir
            let isProcessing = false;
            $('select[name="city_destination"]').on('change', function () {
                //e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = 419;//$('select[name=city_origin]').val();
                let city_destination = $('select[name=city_destination]').val();
                let courier = $('select[name=courier]').val();
                let weight = $('#weight').val();
                let total_price=  $('#total_price').val();

                if (isProcessing) {
                    return;
                }

                isProcessing = true;
                jQuery.ajax({
                    url: "/user/ongkir/",
                    data: {
                        _token: token,
                        city_origin: city_origin,
                        city_destination: city_destination,
                        courier: 'jne',//courier,
                        weight: '1000',//weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function (response) {
                        isProcessing = false;
                        if (response) {
                            // $('#ongkir').empty();
                            // $('.ongkir').addClass('d-block');
                            console.log(response);
                            $.each(response[0]['costs'], function (key, value) {

                                $('#res_servis').val(response[0].code.toUpperCase() + ' - ' + value.service + ' (' + value.cost[0].etd + ' Hari)');
                                $('#res_biaya').val(value.cost[0].value);
                                $('#total_all').val(parseInt(value.cost[0].value)+parseInt(total_price));

                            });

                        }
                    }
                });

            });

        });
    </script>
@endpush
