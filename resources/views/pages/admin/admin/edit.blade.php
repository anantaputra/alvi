@extends('layouts.admin', ['title' => 'Dashboard Setting Akun'])

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Admin</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-cog"></i> Edit Admin</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.admin.update',$admin->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name',$admin->name) }}"
                                               placeholder="Masukkan Name"
                                               class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ old('email',$admin->email) }}"
                                               placeholder="Masukkan Email"
                                               class="form-control @error('email') is-invalid @enderror">

                                        @error('email')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" value="{{ old('phone',$admin->phone) }}"
                                               placeholder="Masukkan Phone"
                                               class="form-control @error('phone') is-invalid @enderror">

                                        @error('phone')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i
                                                class="fa fa-paper-plane"></i>
                                        SIMPAN
                                    </button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                        RESET
                                    </button>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>


@endsection

