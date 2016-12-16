<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClimatRequest;
use App\Models\Climat;
use App\Models\Serre;
use App\Models\Zone;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class ClimatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $climats = Climat::all();
        $zones = Zone::all();
        return view('climat.index', [
            'climats' => $climats,
            'zones' => $zones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('climat.create', [
            'zones'  => $zones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClimatRequest $request)
    {
        //dd($request->all());
       // dd(Carbon::parse($request->date));

        $climat = new Climat();



        $climat->tmax = $request->input('tmax');
        $climat->tmin = $request->input('tmin');
        $climat->hmes = $request->input('hmes');
        $climat->vmes = $request->input('vmes');
        $climat->rs = $request->input('rs');
        $climat->dinst = $request->input('dinst');
        $climat->krs = $request->input('krs');
        $climat->date = Carbon::parse($request->input('date'))->dayOfYear;
        $climat->zone_id = $request->input('zone_id');
        $climat->date_string =  Carbon::parse($request->get('date'))->format('d-m-Y');
       // $d = $request->input('date');
        //$request->input('date') = Carbon::parse($d)->dayOfYear;

        //$request->date = Carbon::create($request->date);
        //dd($climat);
        $climat->save();
        //Climat::create($request->all());

        return redirect()->route('climat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $climat = Climat::findOrFail($id);
        $zone= Zone::findOrfail($climat->zone_id);
        return view('climat.show', ['climat' => $climat,
                                    'zone'  =>  $zone
        ]);
        //return redirect()->route('climat.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serres = Serre::all();
        $climat = Climat::findOrFail($id);
        $zones = Zone::all();
        return view('climat.edit', ['climat' => $climat,
            'serres' => $serres,
            'zones' =>  $zones
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
        $climat = Climat::findOrFail($id);
        $climat->update($request->all());
        return redirect()->route('climat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $climat = Climat::findOrFail($id);
        $climat->delete();
        return redirect()->route('climat.index');
    }
}
