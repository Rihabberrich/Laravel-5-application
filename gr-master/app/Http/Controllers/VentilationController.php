<?php

namespace App\Http\Controllers;

use App\Models\Serre;
use App\Models\Climat;
use App\Ventilation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
class VentilationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serre = Serre::all();
        return view('ventilation.index',[
            'serres' => $serre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serre = Serre::all();
        return view('ventilation.create',[
            'serres' => $serre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datedebut = Carbon::parse($request->get('dated'))->format('d-m-Y');
        $ventilation = [];
        $climat = Climat::where('date_string','like','%'.$datedebut.'%')->first();
        $serre = Serre::findOrFail($request->serre);
        $cpch = $request->get('cpch');
        $cprv = $request->get('cprv');
        $vs = app('Helper')->calc_Vitesse_vent($serre->id);
        $v = app('Helper')->calc_volume_serre($serre->id);
        $heq = $v/($serre->w * $serre->l);
        $stouv = $serre->stouv;
        $hvouv = $serre->hvouv;
        $x = $stouv/($serre->w * $serre->l);
        $g = 9.8;
        $t_hourly = app('Helper')->calc_t_hourly($climat->id);
        $rsh = app('Helper')->calc_rs_hourly($climat->id);
        $j = 0;
        $r = [];

       // dd($rsh);
        //dd($t_hourly);
        foreach ($t_hourly as $key=>$item)
        {
            $t_int[$j] = $item + ((0.017 * $rsh[$key] + 2.64) / (0.685 * pow(app('Helper')->calc_Vitesse_vent($climat->id),0.8) + 1));
            $r[$j] = (3600/$vs) * ($x/2) * $cpch *
                pow(((2 * $g * ((($t_int[$j] + 273) - ($item + 273))/($item + 273)) * ($hvouv/4)) + $cprv * pow($v,2)),0.5) + 1;

            $ventilation[$j] = new Ventilation();
            $ventilation[$j]->serre_id = $serre->id;
            $ventilation[$j]->tint = $t_int[$j];
            $ventilation[$j]->heure = $key;
            $ventilation[$j]->R = $item;

            $ventilation[$j]->save();
            $j++;

        }

        return redirect()->route('ventilation');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $datedebut = $request->get('dated');
        $datefin = $request->get('datef');
        $datedebut = Carbon::parse($datedebut);
        $datefin = Carbon::parse($datefin);
        $nombre_jours = $datefin->diffInDays($datedebut) + 1;

        $ventilation = [];

        for ($i = 1;$i<= $nombre_jours;$i++)
        {
            $ventilation[$i] = Ventilation::where('serre_id',$request->serre)->get();
        }

        //dd($request->serre,$chauffage);
       // dd($ventilation);
        return view('ventilation.show',['ventilations' => $ventilation, 'nombre_jours' => $nombre_jours]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
