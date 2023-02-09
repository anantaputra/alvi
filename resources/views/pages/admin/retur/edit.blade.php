@extends('layouts.admin', ['title' => 'Halaman Data Retur'])
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Data Retur</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-box"></i> Proses Pengajuan Retur</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.retur.update',$retur->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kode Transaksi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="transaction_code" value="{{ old('name',$retur->transaction_code) }}"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="description" readonly>{{$retur->description}}</textarea>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggapan</label>
                                             <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="comment_shop">{{$retur->comment_shop}}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <img src="{{ asset('storage/'.$retur->photo) }}" alt="" width="500px"
                                                 height="500px">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-primary offset-3 mr-1 btn-submit" type="submit"><i
                                                    class="fa fa-paper-plane"></i>Simpan
                                        </button>

                                        <a class="btn btn-warning btn-reset" href='{{ route('admin.retur.index') }}'><i
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

