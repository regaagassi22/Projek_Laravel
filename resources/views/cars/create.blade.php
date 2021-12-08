@extends('adminlte::page')
@section('title', 'Tambah Car')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Mobil</h1>
@stop
@section('content')
    <form action="{{route('cars.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Mobil</label>
                        <input type="text" class="form-control @error('car_name') is-invalid @enderror" id="exampleInputCar" placeholder="Masukan Nama Mobil" name="car_name" value="{{old('car_name')}}">
                        @error('car_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputYear">Tahun</label>
                        <input type="car_year" class="form-control @error('car_year') is-invalid @enderror" id="exampleInputyear" placeholder="Masukan Tahun Perilisan" name="car_year" value="{{old('car_year')}}">
                        @error('car_year') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCondition">Kondisi Mobil</label>
                        <input type="car_condition" class="form-control @error('car_condition') is-invalid @enderror" id="exampleInputCondition" placeholder="exp : Baru / Bekas" name="car_condition">
                        @error('car_condition') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEngine">Mesin</label>
                        <input type="car_engine" class="form-control" id="exampleInputEngine" placeholder="exp : V12,V8,V8s" name="car_engine">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Harga</label>
                        <input type="car_price" class="form-control" id="exampleInputPrice" placeholder="Masukan Harga" name="car_price">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('cars.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
