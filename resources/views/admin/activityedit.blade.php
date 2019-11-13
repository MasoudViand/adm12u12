@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit {{ $activity->name }}</h1>
@stop

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $activity->name }}</h3>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style = "color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{action('ActivityController@update', $id)}}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">ID</label>
                    <input type="text" class="form-control" name="id" placeholder="Enter ID" value="{{ $activity->id }}" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $activity->name }}">
                </div>
                <div class="form-group">
                    <label for="name_full">Full Name</label>
                    <input type="text" class="form-control" name="name_full" placeholder="Enter full name" value="{{ $activity->name_full }}">
                </div>
                <div class="form-group">
                    <label for="unit">Units</label>
                    @php
                        $uu = null;
                        $arr = $activity->unit;
                    @endphp
                    @if ($arr)
                        @foreach ($activity->unit as $key => $value)
                            @php
                                $uu .=  $value;
                                    if (next($arr)) {
                                   $uu .= ','; // Add comma for all elements instead of last
                                   }
                            @endphp
                        @endforeach
                    @endif
                    <input type="text" class="form-control" name="unit" placeholder="Enter units" value="{{ $uu }}">
                    <small>separate by comma i.e. one,two,three</small>


                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <a href="{{ url()->route('activity') }}" class="btn btn-default">Back</a>
                <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-danger">
                    <i class="far fa-trash-alt"></i> DELETE
                </button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE Modal -->
<div class="modal fade modal-danger" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure ?</h4>
            </div>
            <div class="modal-body"><b>
                You are deleting {{ $activity->name }}. <br><br>
                This action is irreversible!
                </b>
            </div>
            <div class="modal-footer">
                <form class="pull-right" action="{{action('ActivityController@destroy', $activity->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-success">Go Delete It !</button>
                </form>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
    <script>
    </script>
@stop

