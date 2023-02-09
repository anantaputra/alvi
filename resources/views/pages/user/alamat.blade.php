@extends('layouts.app', ['titlePage' => 'Dashboard Setting User'])

@section('content-page')
    <div class="container-fluid mt-3" style="padding: 100px 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Setting Alamat</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.setting.alamat',$users->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                            <div class="col-sm-9">
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

                        <div class="form-group row mt-3">
                            <div class="col-sm-12 offset-3">
                                <button class="btn btn-primary btn-submit" type="submit"><i
                                            class="fa fa-paper-plane"></i>Simpan</button>

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
