<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel CRUD for mobile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD for Mobile</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('mobiles.create') }}"> Create Mobile</a>
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
            <th>S.No</th>
            <th>Model Name</th>
            <th>Version</th>
            <th>OS</th>
            <th>OS Version</th>
            <th>Storage</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mobiles as $mobile)
            <tr>
                <td>{{ $mobile->id }}</td>
                <td>{{ $mobile->modelname }}</td>
                <td>{{ $mobile->version }}</td>
                <td>{{ $mobile->os }}</td>
                <td>{{$mobile->osversion}}</td>
                <td>{{$mobile->storage}}</td>
                <td>
                    <form action="{{ route('mobiles.destroy',$mobile->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('mobiles.edit',$mobile->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{!! $mobiles->links() !!}
</body>
</html>
