@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Update Your Concert</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('concerts.index') }}"> Back</a>
            </div>
        </div>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Attention!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('concerts.update',['concert'=>$concert->id]) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
            <div class="row">
                    <div class="mb-3">
                        <label for="nama">Name</label>
                        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Name..." value="{{old('nama') ?? $concert->nama}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kode_konser">Concert Code:</label>
                         <select class="form-select" name="kode_konser" id="kode_konser" value="{{old('kode_konser') ?? $concert->kode_konser}}">
                           <option value="#1 Musik Jazz" {{(old('kode_konser') ?? $concert->kode_konser) == '#1 Musik Jazz' ? 'selected' : ''}}> Music Jazz</option>
                           <option value="#2 Musik Rock" {{(old('kode_konser') ?? $concert->kode_konser) == '#2 Musik Rock' ? 'selected' : ''}}> Music Rock</option>
                           <option value="#3 Musik Pop" {{(old('kode_konser') ?? $concert->kode_konser) == '#3 Musik Pop' ? 'selected' : ''}}> Music Pop</option>
                         </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
        </form>

 </div>

@endsection

