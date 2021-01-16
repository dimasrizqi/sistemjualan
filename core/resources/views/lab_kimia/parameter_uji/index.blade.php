@extends('layouts.master')
@section('title', 'Daftar parameter uji')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1><a href="{{ route('parameteruji.create') }}" class="btn btn-info">Tambah Data</a>    Parameter uji </h1> 
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
                    @foreach ($parameter_uji  as $no => $item)
                <span>{{$no+1  }} . {!!$item->name!!} - Rp. {{number_format($item->harga,0,",",".")}}</span>
                        <form action="{{ route('parameteruji.destroy',$item->id) }}" method="POST">
                            {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-primary" href="{{ route('parameteruji.edit',$item->id) }}">Show</a>
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
