<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneRequest;
use App\Models\Zone;
use Illuminate\Http\Request;

use App\Http\Requests;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $zones = Zone::where('nom', 'like', '%' . $request->get('search') . '%')
                        ->OrWhere('emplacement', 'like', '%' . $request->get('search') . '%')
                        ->get();
        }else{
            $zones = Zone::all();
        }

        return view('zone.index', ['zones' => $zones])->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ZoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {

        $env = $this->getEnvirenement($request->get('envirenement'));

        Zone::create(array_merge([
            'nom'         => $request->get('nom'),
            'emplacement' => $request->get('emplacement'),
            'latitude'    => $request->get('latitude'),
            'longitude'   => $request->get('longitude'),
        ], $env));

        return redirect()->route('zone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zone = Zone::find($id);
        return view('zone.show', ['zone' => $zone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::find($id);
        return view('zone.edit', ['zone' => $zone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ZoneRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request, $id)
    {
        $zone = Zone::find($id);

        $env = $this->getEnvirenement($request->get('envirenement'));

        $zone->update(array_merge([
            'nom'         => $request->get('nom'),
            'emplacement' => $request->get('emplacement'),
            'latitude'    => $request->get('latitude'),
            'longitude'   => $request->get('longitude'),
        ], $env));

        return redirect()->route('zone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return redirect()->route('zone.index');
    }

}
