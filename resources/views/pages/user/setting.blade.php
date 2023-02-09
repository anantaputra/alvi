@extends('layouts.app', ['titlePage' => 'Dashboard Setting User'])

@section('content-page')
    <div class="container-fluid mt-3" style="padding: 100px 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Setting Akun</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.setting.update') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                 <input type="text" 
                                 	name="name" value="{{ old('name',Auth::user()->name) }}" 
                                 	placeholder="Masukkan Name"
                                    class="form-control @error('name') is-invalid @enderror">
            						@error('name')
                                    <div class="invalid-feedback" style="display: block">
                                    	{{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>

                         <div class="form-group row mt-4">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                 <input type="text" 
                                 	name="email" value="{{ old('email',Auth::user()->email) }}" 
                                 	placeholder="Masukkan Name"
                                    class="form-control @error('email') is-invalid @enderror">
            						@error('email')
                                    <div class="invalid-feedback" style="display: block">
                                    	{{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label class="col-sm-3 col-form-label">No Telpn</label>
                            <div class="col-sm-9">
                                 <input type="text" 
                                 	name="phone" value="{{ old('phone',Auth::user()->phone) }}" 
                                 	placeholder="Masukkan Name"
                                    class="form-control @error('phone') is-invalid @enderror">
            						@error('phone')
                                    <div class="invalid-feedback" style="display: block">
                                    	{{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>

                         <div class="form-group row mt-4">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                 <input type="password" 
                                 	name="password" value="" 
                                 	placeholder="Masukkan Pasword"
                                    class="form-control @error('password') is-invalid @enderror">
            						@error('password')
                                    <div class="invalid-feedback" style="display: block">
                                    	{{ $message }}
                                    </div>
                                    @enderror
                                    <span class="text-small">*note : Kosongkan Jika tidak di ganti</span>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label class="col-sm-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-9">
                                 <input type="password" 
                                 	name="password_confirmation" value="" 
                                 	 class="form-control"
                                 	placeholder="Masukkan Pasword Konfirmasi">
                            </div>
                        </div>




                        <div class="form-group row mt-3">
                            <div class="col-sm-12 offset-3">
                                <button class="btn btn-primary btn-submit" type="submit"><i
                                            class="fa fa-paper-plane"></i> Simpan</button>

                                <a class="btn btn-warning btn-reset" href='{{ route('transactions.user.index') }}'><i
                                            class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
