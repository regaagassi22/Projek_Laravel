<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
    return view('cars.index', [
        'cars' => $cars
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->only([
            'car_name', 'car_year', 'car_condition','car_engine','car_price'
        ]);
        $user = Car::create($array);
        return redirect()->route('cars.index')
            ->with('success_message', 'Berhasil menambah Mobil baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        if (!$car) return redirect()->route('cars.index')
            ->with('error_message', 'Mobil dengan id'.$id.' tidak ditemukan');
        return view('cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->car_name = $request->car_name;
        $car->car_year = $request->car_year;
        $car->car_condition = $request->car_condition;
        $car->car_engine = $request->car_engine;
        $car->car_price = $request->car_price;
        $car->save();
        return redirect()->route('cars.index')
            ->with('success_message', 'Berhasil mengubah Mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
    if ($car) $car->delete();
    return redirect()->route('cars.index')
        ->with('success_message', 'Berhasil menghapus Mobil');
    }
}
