@extends('layouts.admin', ['title' => 'Halaman Laporan Transaksi'])

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Transaksi</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-print"></i> Pilih Periode Laporan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.laporan.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Peridoe Awal</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="par1"
                                            required 
                                                   class="form-control">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Peridoe Akhir</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="par2"
                                            required 
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-primary offset-3 mr-1 btn-submit" type="submit"><i
                                                    class="fa fa-print"></i>Cetak Laporan
                                        </button>
                                        <a class="btn btn-warning btn-reset" href='{{ route('admin.laporan.index') }}'><i
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

