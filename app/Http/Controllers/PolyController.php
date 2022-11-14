<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poly;
use Illuminate\Http\Request;

class PolyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polies = Poly::latest()->get();

        // get doctor with poly count
        foreach($polies as $poly) {
            $doctors[] = Doctor::where('id_poli', $poly->id_poli)->get();
        }

        return view('polies.index', [
            'pageTitle' => 'Data Poli',
            'polies' => $polies,
            'doctors' => collect($doctors)->map(function($doctor) {
                return $doctor->count();
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poly  $poly
     * @return \Illuminate\Http\Response
     */
    public function show(Poly $poly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poly  $poly
     * @return \Illuminate\Http\Response
     */
    public function edit(Poly $poly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poly  $poly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poly $poly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poly  $poly
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poly $poly)
    {
        //
    }
}
