<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
    <title>AdminLTE 3 | Starter</title>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Atur Halaman Pimpinan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="button-buat">
        <a class="btn btn-success" href="{{ route('pimpinan.create') }}"> Tambah Pimpinan Baru</a>
    </div>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Linkedin</th>
            <th>Twitter</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pimpinan as $pimpin)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $pimpin->image }}" width="100px"></td>
            <td>{{ $pimpin->nama }}</td>
            <td>{{ $pimpin->jabatan }}</td>
            <td>{{ $pimpin->linkedin }}</td>
            <td>{{ $pimpin->twitter }}</td>
            <td>{{ $pimpin->facebook }}</td>
            <td>{{ $pimpin->instagram }}</td>
            <td>
                <form action="{{ route('pimpinan.destroy',$pimpin->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('pimpinan.show',$pimpin->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('pimpinan.edit',$pimpin->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $pimpinan->links() !!}
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
</body>
</html>