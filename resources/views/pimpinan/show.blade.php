@extends('visimisi.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pimpinan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pimpinan.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $pimpinan->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan:</strong>
                {{ $pimpinan->jabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/image/{{ $pimpinan->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection