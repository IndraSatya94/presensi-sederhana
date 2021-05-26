@extends('puskesmas.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Visi dan Misi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('puskesmas.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $puskesmas->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $puskesmas->body }}
            </div>
        </div>
    </div>
@endsection