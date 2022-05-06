<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mobile Form - Laravel 8 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Mobile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mobiles.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('mobiles.update',$mobile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model Name:</strong>
                    <input type="text" name="modelname" value="{{ $mobile->modelname }}" class="form-control" placeholder="Model name">
                    @error('modelname')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Version:</strong>
                    <input type="text" name="version" class="form-control" placeholder="Version" value="{{ $mobile->version }}">
                    @error('version')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>OS:</strong>
                    <input type="text" name="os" class="form-control" placeholder="OS" value="{{ $mobile->os }}">
                    @error('os')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>OS Version:</strong>
                    <input type="text" name="osversion" class="form-control" placeholder="OS Version" value="{{ $mobile->osversion }}">
                    @error('osversion')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Storage:</strong>
                    <input type="text" name="storage" value="{{ $mobile->storage }}" class="form-control" placeholder="Storage">
                    @error('storage')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
