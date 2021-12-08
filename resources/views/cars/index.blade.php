@extends('adminlte::page')
@section('title', 'List Car')
@section('content_header')
    <h1 class="m-0 text-dark">List Car</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('cars.create')}}" class="btn btn-warning bg-orange mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="table-dark bg-warning">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Condition</th>
                            <th>Engine</th>
                            <th>Price</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $key => $car)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$car->car_name}}</td>
                                <td>{{$car->car_year}}</td>
                                <td>{{$car->car_condition}}</td>
                                <td>{{$car->car_engine}}</td>
                                <td>{{$car->car_price}}</td>
                                <td>
                                    <a href="{{route('cars.edit', $car)}}" class="btn btn-primary btn-xs">
                                    Edit
                                    </a>
                                    <a href="{{route('cars.destroy', $car)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
