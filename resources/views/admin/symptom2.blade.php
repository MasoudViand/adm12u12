@extends('adminlte::page')

@section('title', config('app.name'))

@section('content_header')
    <h1>Symptoms List</h1>
    <div class="container">
        <a href="{{--{{ url('admin/symptom/add') }}--}}"><button class="btn btn-info btn-lg pull-right">Add New</button></a>
        <div class="clearfix"></div>
    </div>


@stop

@section('content')


    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                {{ \Session::get('success') }}
            </div><br />
        @endif

        <div class="box box-primary" style="padding: 15px;">

            <table class="datatable table-striped table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 text-center">
            {{--{{ $symptoms->links() }}--}}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('serverSide') }}',
                columns: [
                    { "data": "_id" },
                    { "data": "name" },
                    { "data": "displayname" },
                ]
            });
        });
    </script>
@stop

