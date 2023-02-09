@extends('layouts.admin', ['title' => 'Dashboard Admin Category Create'])

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Kategori</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-box"></i> Tambah Kategori</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Kategori</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                   placeholder="Masukkan Nama Kategori"
                                                   class="form-control @error('name') is-invalid @enderror">

                                            @error('name')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="photo"
                                                   class="form-control @error('photo') is-invalid @enderror">

                                            @error('photo')
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
                                        <a class="btn btn-warning btn-reset" href='{{ route('admin.category.index') }}'><i
                                                    class="fa fa-arrow-left"></i> Kembali</a>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>


@endsection

