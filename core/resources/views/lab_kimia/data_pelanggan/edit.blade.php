@extends('layouts.master')
@section('title', 'Data Pelanggan')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1>Silahkan ubah dan klik simpan atau <a href="{{  route('datapelanggan.index')}}" class="btn btn-info">Kembali</a> </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @if ($message = Session::get('success'))

                    <div class="alert alert-success">
            
                        <p>{{ $message }}</p>
            
                    </div>
            
                    @endif
                    @foreach ($data_pelanggan  as $no => $item)
                        <form action="{{ route('datapelanggan.update',$item->id) }}" method="POST">
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama</label>
                                    <input type="text" value="{{$item->name}}" placeholder="Masukan Nama Lengkap" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Alamat</label>
                                        <input type="text"  value="{{$item->alamat}}" placeholder="Masukan Alamat Lengkap" name="alamat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* No. Tlp / Handphone</label>
                                        <input type="number"  value="{{$item->tlp}}" placeholder="Masukan no tlp yang bisa dihubungi" name="tlp" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  value="{{$item->email}}" placeholder="Masukan Nama Lengkap" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
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
