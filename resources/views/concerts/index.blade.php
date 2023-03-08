@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
               <h2>List Concert</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="250px" class="text-center">Tiket Konser</th>
            <th width="250px" class="text-center">Nama</th>
            <th width="300px"class="text-center">Action</th>
        </tr>
    @forelse ($concerts as $concert)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $concert->kode_konser }}</td>
            <td class="text-center">{{$concert->nama}}</td>
            <td class="text-center">
                @can('create',$concert)
                <form action="{{ route('concerts.destroy',$concert->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('concerts.show',$concert->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('concerts.edit',$concert->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                </form>
                @endcan
                @cannot('create', $concert)
                <a class="btn btn-info btn-sm" href="{{ route('concerts.show',$concert->id) }}">Show</a>
                @endcannot


            </td>
        </tr>
    @empty
    <td colspan="8" class="text-center">Tidak ada data...</td>
    @endforelse
    </table>

 </div>
@endsection
