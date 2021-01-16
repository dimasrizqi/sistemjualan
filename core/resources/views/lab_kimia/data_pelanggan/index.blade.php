@extends('layouts.master')
@section('title', 'Data Pelanggan')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1><a href="{{ route('datapelanggan.create') }}" class="btn btn-info">Tambah Data</a>    Data Pelanggan </h1> 
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
                    @if ($message = Session::get('deleted'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @foreach ($data_pelanggan  as $no => $item)
                        {{$no+1  }} . {{$item->name}}<br>
                        <form action="{{ route('datapelanggan.destroy',$item->id) }}" method="POST">
                            {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-primary" href="{{ route('datapelanggan.edit',$item->id) }}">Show</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
