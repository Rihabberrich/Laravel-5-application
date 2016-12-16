<?php

namespace App\Http\Controllers;

use App\Models\Serre;
use App\PhotoSynthese;
use Illuminate\Http\Request;
use App\Models\Climat;

use Carbon\Carbon;

use App\Http\Requests;

class PhotosyntheseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phs = PhotoSynthese::all();
        $serres = Serre::all();
        return view('photosynthese.index', [
            "phs" => $phs,
            "serres" => $serres
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serres = Serre::all();

        return view('photosynthese.create', [
            "serres" => $serres
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = 0.0645;
        $co2 = $request->get('co2');
        $effutl = 0.1;
        $lfmax = $effutl * $co2;

        $serre = Serre::findOrFail($request->get('serre'));
      //  $zone = Zone::where('id',$serre->zone_id)->first();
        $datedebut = Carbon::parse($request->get('dated'))->format('d-m-Y');
        $climat = Climat::where('date_string','like','%'.$datedebut.'%')->first();
        // dd($climat,$datedebut,$request->get('dated'));
        // dd($climat);
        $datedebut = $request->get('dated');
        $datefin = $request->get('datef');
        $datedebut = Carbon::parse($datedebut);
        $datefin = Carbon::parse($datefin);
        $nombre_jours = $datefin->diffInDays($datedebut) + 1;
        $t_hourly = app('Helper')->calc_t_hourly($climat->id);
        $rsh = app('Helper')->calc_rs_hourly($climat->id);
        $v = app('Helper')->calc_Vitesse_vent($climat->id);
        $type = $request->get('type_serre');


        $t_int = [];
        $j = 0;

        foreach ($t_hourly as $key=>$item)
        {
            if ($type == 1)
            {
                $t_int[$key] = $item + ((0.017 * $rsh[$key] + 2.64)/(1 + 0.085 * pow($v, 0.8)));
            }
            else
            {
                $t_int[$key] = $item + ((0.043 * $rsh[$key])/(0.612 * $v + 0.091));
            }
        }

        $k = $request->get('k');
        $m = 0.1;
        $qe = $request->get('qe');
        $lai = $request->get('lai');

        $par = [];
        $i = 0;
        foreach ($rsh as $key=>$item)
        {
            $par[$i] = 0.48 * $serre->ctz * $rsh[$key];
            $i++;
        }



        $pgred = [];


        foreach ($t_int as $key=>$item)
        {
            if (($item <= 15) && ($item > 0))
            {
                $pgred[$key] = 1 / (1- exp(-0.6*($item - 7.5)));
            }
            elseif (($item > 15) && ($item < 25))
            {
                $pgred[$key] = 1;
            }
            elseif ($item >= 25)
            {
                $pgred[$key] = 1 / (1- exp(-0.7*($item - 31.5)));
            }
        }

        $pb = [];
        $j = 0;
        $photosynthese = [];
        foreach ($pgred as $key=>$item)
        {
            $pb[$key] = ($d * $lfmax * $item)/$k * log10(((1-$m) * $lfmax + $qe * $k * $par[$j] * 4.6)/(1-$m) * $lfmax + $qe * $par[$j] * 4.6 * $k * exp(-$k * $lai));



            $photosynthese[$j] = new PhotoSynthese();
            $photosynthese[$j]->serre_id = $serre->id;
            $photosynthese[$j]->tint = $t_int[$key];
            $photosynthese[$j]->heure = $key;
            $photosynthese[$j]->temperature = $t_hourly[$key];
            $photosynthese[$j]->pb = $pb[$key];
            $photosynthese[$j]->par = $par[$j];
            $photosynthese[$j]->rs = $rsh[$key];
            $photosynthese[$j]->lai = $request->get('lai');
            $photosynthese[$j]->save();

            $j++;

        }
//        dd($photosynthese);

        return redirect()->route('photosynthese.index');

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

        $phs = PhotoSynthese::where('serre_id',$request->serre)->get();


        //dd($request->serre,$chauffage);

        return view('photosynthese.show',['phs' => $phs]);
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
