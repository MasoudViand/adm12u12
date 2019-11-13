@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add New Activity</h1>
@stop

@section('content')
    <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style = "color:yellow">{{ $error }}</li>
                @endforeach
                </ul>
            </div><br />
            @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Activity</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('admin/activity/add')}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" class="form-control" name="_id" placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label for="name_full">Full Name</label>
                        <input type="text" class="form-control" name="name_full" placeholder="Enter full name" >
                    </div>
                    <div class="form-group">
                        <label for="unit">Units</label>
                        <input type="text" class="form-control" name="unit" placeholder="Enter units" >
                        <small>separate by comma i.e. one,two,three</small>


                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <a href="{{ url()->route('activity') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script>
    </script>
@stop

