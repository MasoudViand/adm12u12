@extends('adminlte::page')

@section('title', config('app.name'))

@section('content_header')
    <h1>Activity List</h1>
    <div class="container">
        <a href="{{ url('admin/activity/add') }}"><button class="btn btn-info btn-lg pull-right"><i class="far fa-plus-square"></i> Add New</button></a>
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

    <table id="table" class="table table-striped table-bordered">
        <thead>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Full Name</th>
            <th>Units</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        </div>
                <div class="col-md-12 text-center">
                    {{--{{ $activities->links() }}--}}
                </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                //processing: true,
                //serverSide: true,
                ajax: '{{ route('activityserverSide') }}',
                //  type: 'POST',
                columns: [
                    { "data": "_id" },
                    { "data": "name" },
                    { "data": "name_full", "defaultContent": "<i>Not set</i>"  },
                    { "data": "unit", "defaultContent": "<i>Not set</i>" },
                    { "data": 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop

