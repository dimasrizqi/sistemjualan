@extends('layouts.master')
@section('title', 'Daftar parameter uji')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1>Silahkan ubah dan klik simpan atau <a href="{{  route('parameteruji.index')}}" class="btn btn-info">Kembali</a> </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                   
                    @foreach ($parameter_uji  as $no => $item)
                        <form action="{{ route('parameteruji.update',$item->id) }}" method="POST">
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="form-group">
                        <i>* jika ingin memasukan simbol  di atas silahkan ketik dengan menambahkan tag <b> &lt;sup&gt;angka atau hurufnya&lt;sup&gt;</b></i> Cth : H&lt;sup&gt;2&lt;sup&gt;O | Hasil H<sup>2</sup>O<br>
                        <i>* jika ingin memasukan simbol  di bawah silahkan ketik dengan menambahkan tag <b> &lt;sub&gt;angka atau hurufnya&lt;sub&gt; </b> </i> Cth : H&lt;sub&gt;2&lt;sub&gt;O | Hasil H<sub>2</sub>O<br><br>
                        <label for="">Nama Parameter Uji</label><br>
                        <input type="text" value="{{$item->name}}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>* Harga</label>
                            <input type="number" value="{{$item->harga}}" placeholder="Masukan Harga hanya dengan angka" name="harga" class="form-control">
                            </div>
                        </div>
                            @csrf
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
