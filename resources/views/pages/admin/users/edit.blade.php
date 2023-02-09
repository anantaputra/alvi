@extends('layouts.admin', ['title' => 'Halaman Ubah Member'])

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Member</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-cog"></i> Ubah Data User :  {{ $user->name }}</h4>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Member</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="Masukkan Nama Member"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" value="{{ old('email',$user->email) }}" placeholder="Masukkan Email"
                                                class="form-control @error('email') is-invalid @enderror">

                                            @error('email')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone" value="{{ old('phone',$user->phone) }}" placeholder="Masukkan Phone"
                                                class="form-control @error('phone') is-invalid @enderror">

                                            @error('phone')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mr-1 btn-submit offset-3" type="submit"><i class="fa fa-save"></i>
                                        Simpan</button>
                                    <a class="btn btn-warning btn-reset" href='{{ route('admin.users.index') }}'><i class="fa fa-arrow-left"></i> Kembali</a>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>


@endsection

