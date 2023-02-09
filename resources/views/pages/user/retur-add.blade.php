@extends('layouts.app', ['titlePage' => 'Dashboard Retur User'])

@section('content-page')
    <div class="container-fluid mt-3" style="padding: 100px 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Pengajuan Retur</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.retur.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                        <input type="hidden" name="tracation_id" value="{{ $retur->id }}">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Transaksi</label>
                            <div class="col-sm-9">
                                 <input type="text" 
                                 	name="transaction_code" value="{{ $retur->code }}" 
                                 	readonly 
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                 <input type="file" 
                                 	name="photo"
                                 	required 
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          required
                                          cols="30"
                                          placeholder="Masukan Deskripsi Keluhan"
                                          rows="4"></textarea>
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
