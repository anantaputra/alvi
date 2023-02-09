@extends('layouts.app', ['titlePage' => 'Ecommerce - Kontak Kami'])
@push('after-style')
<style>
    .whole-page-overlay{
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: fixed;
        background: rgba(0,0,0,0.6);
        width: 100%;
        height: 100% !important;
        z-index: 1050;
        display: none;
        }
        .whole-page-overlay .center-loader{
        top: 50%;
        left: 52%;
        position: absolute;
        color: white;
        }
 </style>
@endpush
@section('content-page')
<div class="whole-page-overlay">

    <div class="tenor-gif-embed center-loader" data-postid="25192894" data-share-method="host" data-aspect-ratio="1" data-width="5%">
        <a href="#" class="btn btn-success">Loading...</a>
        <img src="{{ asset('assets/img/loading.gif') }}" alt="">
    </div>
</div>
<div class="page-content page-home">

    <section class="information">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col text-center" style="bold">
                    <h2>Kontak Kami</h2>
                </div>
                <br><br>
                <div class="contact-from-section mt-150 mb-150">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mb-5 mb-lg-0">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        @endif
                                        <form action="{{ route('send-email') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" name="name" class="form-control" id="name" required placeholder="masukan nama">
                                              </div>
                                            <div class="mb-3">
                                              <label  class="form-label">Email</label>
                                              <input type="email" name="email" class="form-control" id="email" required placeholder="Masukan Email">
                                            </div>
                                            <div class="mb-3">
                                              <label for="exampleInputPassword1" class="form-label">Pesan</label>
                                                <textarea name="message" id="message" required class="form-control" cols="30" id="address" rows="5" placeholder="Masukan Pesan"></textarea>
                                            </div>
  
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" id="btn-submit" type="submit">Kirim</button>
                                              </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-form-wrap">
                                    <div class="contact-form-box">
                                        <h4>Alamat</h4>
                                        <p>Jl. Nusantara No.97, Beji Kidul, Tritih Kulon, Kec. Cilacap Utara, Kabupaten Cilacap, Jawa Tengah.</p>
                                    </div>
                                    <div class="contact-form-box">
                                        <h4>Jam Operasional</h4>
                                        <p>Senin - Sabtu : 08.00 - 20.00 </p>
                                    </div>
                                    <div class="contact-form-box">
                                        <h4>Kontak</h4>
                                        <table>
                                            <tr>
                                                <td>Whatsapp </td>
                                                <td>:</td>
                                                <td><a href="https://wa.me/6281909123456" class="btn text-black"> 081909123456</a></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>
                                                    <a href="mailto:jaka@gmail.com"class="btn text-black">ariesta.stuff@gmail.com</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>IG</td>
                                                <td>:</td>
                                                <td>
                                                    <a href="https://www.instagram.com/ariesta.stuf/"class="btn text-black">Ariesta Stuff </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <br><br><br>


</div>

@endsection
@push('after-script')
    <script>
        $(document).ready(function(){
            // jika name not empty
            $("#btn-submit").on("click", function(){
                if($('#name').val() != '' && $('#email').val() != '' && $('#address').val() != ''){
                    // jika checkbox checked
                    $('.whole-page-overlay').show();

                }
            });
        });
    </script>
@endpush
