@extends('layouts.master')
@section('title', 'Data Pelanggan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Data Pelanggan</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('datapelanggan.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama</label>
                                        <input type="text" placeholder="Masukan Nama Lengkap" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Alamat</label>
                                        <input type="text" placeholder="Masukan Alamat Lengkap" name="alamat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* No. Tlp / Handphone</label>
                                        <input type="number" placeholder="Masukan no tlp yang bisa dihubungi" name="tlp" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Masukan Nama Lengkap" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
