@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit {{ $symptom->name }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit {{ $symptom->name }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{action('SymptomController@update', $id)}}">
                @csrf
                <div class="box-body">
                    <div class="form-groupc col-sm-6">
                        <label for="name">ID</label>
                        <input type="text" class="form-control" name="id" placeholder="Enter ID" value="{{ $symptom->id }}" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $symptom->name }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name_full">Display Name</label>
                        <input type="text" class="form-control" name="displayname" placeholder="Enter displaynamee" value="{{ $symptom->displayname }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name_full">Severity</label>
                        <input type="text" class="form-control" name="severity" placeholder="Enter severity" value="{{ $symptom->severity }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name_full">Frequency</label>
                        <input type="text" class="form-control" name="frequency" placeholder="Enter frequency" value="{{ $symptom->frequency }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name_full">Status</label>
                        <input type="text" class="form-control" name="status" placeholder="Enter status" value="{{ $symptom->status }}">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="name_full">Brief</label>
                        <input type="text" class="form-control" name="brief" placeholder="Enter brief" value="{{ $symptom->brief }}">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <a href="{{ url()->route('symptom') }}" class="btn btn-default">Back</a>
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
                        You are deleting {{ $symptom->name }}. <br><br>
                        This action is irreversible!
                    </b>
                </div>
                <div class="modal-footer">
                    <form class="pull-right" action="{{action('SymptomController@destroy', $symptom->id)}}" method="post">
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

