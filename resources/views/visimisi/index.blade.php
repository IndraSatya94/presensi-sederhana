@extends('visimisi.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Halaman Visi dan Misi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('visimisi.create') }}"> Buat Visimisi Baru</a>
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
            <th>No</th>
            <th>Image</th>
            <th>Nama</th>
            <th>Body</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($visimisi as $vmisi)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $vmisi->image }}" width="100px"></td>
            <td>{{ $vmisi->nama }}</td>
            <td>{{ $vmisi->body }}</td>
            <td>
                <form action="{{ route('visimisi.destroy',$vmisi->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('visimisi.show',$vmisi->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('visimisi.edit',$vmisi->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $visimisi->links() !!}
        
@endsection