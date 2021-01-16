@extends('layouts.master')
@section('title', 'Buku Induk ')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Data Pelayanan</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('bukuinduk.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                
                                @if ($message = Session::get('failed'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Pilih Pelanggan</label><br>
                                        <select class="form-control" name="pelanggan" id="pelanggan">
                                            <option value=""></option> 
                                            @foreach ($pelanggan as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Petugas Pelayanan</label>
                                        {{-- <input type="text" placeholder="" name="petugas_pelayanan" class="form-control" required> --}}
                                        <select class="form-control" name="petugas_pelayanan" id="petugas_pelayanan">
                                        {{-- <option value="@if ($message = Session::get('id_user')){{ $message }}@endif">{{}}</option>  --}}
                                            {{-- @foreach ($usernya->where(Session::get('id_user')) as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach --}}

                                            <option value=""></option> 

                                            @foreach ($usernya as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Petugas Sampling</label>
                                        {{-- <input type="text" placeholder="" name="petugas_sampling" class="form-control" required> --}}
                                        <select class="form-control" name="petugas_sampling" id="petugas_sampling">
                                            <option value=""></option> 
                                            @foreach ($usernya as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Sampel</label>
                                        <input type="text" placeholder="" name="lokasi" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Jenis Sampel</label>
                                        <input type="text" placeholder="" name="jenis" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Jumlah Sampel</label>
                                        <input type="text" placeholder="" name="jml_sampel" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Volume/Berat Sampel</label>
                                        <input type="text" placeholder="" name="volume" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Satuan</label>
                                        <select class="form-control" name="berat" id="berat">
                                            <option value="ML">ML</option> 
                                            <option value="KG">KG</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Wadah Sampel</label>
                                        <input type="text" placeholder="" name="wadah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Surat Permintaan Pengujian</label><br>
                                        {{-- <input type="text" placeholder="" name="spp" class="form-control" required> --}}
                                        <input type="radio" name="spp" value="1" id="spp" checked> Ya <br>
                                        <input type="radio" name="spp" value="0" id="spp" > Tidak  <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Diserahkan Oleh Customer</label>
                                        <input type="text" placeholder="" name="di_serahkan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Sampling</label>
                                        <input type="date" placeholder="" name="tgl_sampling" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group" id="tambahan">
                                        <label>* Pilih Parameter Uji</label><br>
                                        @foreach ($parameter_uji as $item)
                                        <input type='checkbox' name='parameter_uji[]' value='{{$item->id}}' /> {!!$item->name!!}
                                        @endforeach
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

@push('page-scripts')

@endpush