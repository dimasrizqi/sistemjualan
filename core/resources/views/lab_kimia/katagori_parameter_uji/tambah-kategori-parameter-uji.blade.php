@extends('layouts.master')
@section('title', 'Tambah parameter uji')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input parameter uji</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('parameteruji.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <i>* jika ingin memasukan simbol  di atas silahkan ketik dengan menambahkan tag <b> &lt;sup&gt;angka atau hurufnya&lt;sup&gt;</b></i> Cth : H&lt;sup&gt;2&lt;sup&gt;O | Hasil H<sup>2</sup>O<br>
                                        <i>* jika ingin memasukan simbol  di bawah silahkan ketik dengan menambahkan tag <b> &lt;sub&gt;angka atau hurufnya&lt;sub&gt; </b> </i> Cth : H&lt;sub&gt;2&lt;sub&gt;O | Hasil H<sub>2</sub>O<br><br>
                                        <label>* Nama</label>
                                        <input type="text" placeholder="Masukan Nama Parameter Uji" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Harga</label>
                                        <input type="number" placeholder="Masukan Harga hanya dengan angka" name="harga" class="form-control">
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
