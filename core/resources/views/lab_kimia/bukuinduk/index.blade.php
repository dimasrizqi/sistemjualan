@extends('layouts.master')
@section('title', 'Buku Induk')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1><a href="{{ route('bukuinduk.create') }}" class="btn btn-info">Tambah Data</a>    Buku Induk </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
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
                        <table class="table table-striped table-md">
                            <tr>
                                <th >NO.</th>
                                <th >No FPPS</th>
                                <th >No Sampel</th>
                                <th colspan="2">Nama Pelanggan</th>
                                <th >Actions</th>
                            </tr>
                            @foreach ($collections as $no => $item)
                                <tr>
                                    <td> {{ $no + 1 }} </td>
                                    <td >{{$item->no_fpps}} </td>
                                    <td >{{$item->no_sampel}} </td>
                                    <td >
                                        @foreach ($data_pelanggan->where('id',$item->pelanggan) as $items)
                                        {{$items->name}}
                                        @endforeach
                                        </td>
                                        
                                    <td style="text-align: right"><form  action="{{ route('bukuinduk-print',$item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success" href="{{ route('bukuinduk-print',$item->id) }}">Print</button>
                                    </form>
                                    </td>
                                    <td>
                                        
                                        <form class="pull-left" action="{{ route('bukuinduk.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            
                                            <a class="btn btn-primary" href="{{ route('bukuinduk.edit',$item->id) }}">Show</a>
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </table>
                    </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
