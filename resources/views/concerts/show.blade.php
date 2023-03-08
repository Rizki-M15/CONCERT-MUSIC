@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Yours</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('concerts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ticket:</strong>
                {{ $concert->kode_konser }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $concert->nama }}
            </div>
        </div>
    </div>
</div>
@endsection
