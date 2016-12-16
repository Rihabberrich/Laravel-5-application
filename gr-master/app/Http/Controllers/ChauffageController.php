<?php

namespace App\Http\Controllers;

use App\Chauffage;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Climat;
use App\Models\Serre;
use App\Helpers\General;

class ChauffageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$chauffages = Chauffage::all();
        $serres = Serre::all();
        return view('chauffage.index',[
            'serres' => $serres,
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
        return view('chauffage.create',[
            'serres' => $serres,
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
        $serre = Serre::findOrFail($request->get('serre'));
        $zone = Zone::where('id',$serre->zone_id)->first();
        $datedebut = Carbon::parse($request->get('dated'))->format('d-m-Y');
        $climat = Climat::where('date_string','like','%'.$datedebut.'%')->first();
       // dd($climat,$datedebut,$request->get('dated'));
       // dd($climat);
        $datedebut = $request->get('dated');
        $datefin = $request->get('datef');
        $datedebut = Carbon::parse($datedebut);
        $datefin = Carbon::parse($datefin);
        $nombre_jours = $datefin->diffInDays($datedebut) + 1;


        $fpa = 0.5*(1+($serre->w * $serre->l)/app('Helper')->calc_ac($serre->id));
        $fps = 1 - $fpa;
        $i = [];
        $t_hourly = app('Helper')->calc_t_hourly($climat->id);
        $t_atm = [];
        $tp = [];
        $rsh = app('Helper')->calc_rs_hourly($climat->id);
        $ra = app('Helper')->calc_ra($climat->id);
        $i = ((app('Helper')->calc_rsd($climat->id)/$ra) - 0.25) / 0.5;
        for ($j = 0; $j<24;$j++) {

            //$t_atm[$j] = $i * ($t_hourly[$j] - 15) + (1-$i) * ($t_hourly[$j]-4);
            //$tp[$j] = $t_hourly[$j] + ((($serre->tc -$t_hourly[$j]) + 0.2 * $t_atm[$j] - 3.7 + 0.01*$rsh[$j])/(1.3+0.4*app('Helper')->calc_Vitesse_vent($climat->id)^0.8));
        }
        $j =0;
        foreach ($t_hourly as $key=>$item)
        {
            $t_atm[$j] = $i * ($item - 15) + (1-$i) * ($item-4);
            $tp[$j] = $item + ((($serre->tc -$item) + 0.2 * $t_atm[$j] - 3.7 + 0.01*$rsh[$key])/(1.3+0.4*pow(app('Helper')->calc_Vitesse_vent($climat->id),0.8)));
            $j++;
        }
        $r =  (1+ 0.3 * app('Helper')->calc_Vitesse_vent($climat->id))/3600;
        $o = 5.67037 * pow(10,-8);

        $selected_he = $request->get('type');
        if ($selected_he == 0)
        {
            $he = [];


                for ($j = 0; $j < 24 ; $j++)
                {
                 //   $he[$j] = (1.48*($tp[$j] - $t_hourly[$j])^0.5 + 9.4 * app('Helper')->calc_Vitesse_vent($climat->id)^1.6)^0.5;

                }
                $j = 0;
                foreach ($t_hourly as $item)
                {
                    $he[$j] = (1.48*pow($tp[$j] - $item,0.5) + 9.4 * pow(pow(app('Helper')->calc_Vitesse_vent($climat->id),1.6),0.5));
                    $j++;
                }


        }
        else
        {
            $he = 0;
            switch ($selected_he) {
                case 1:
                    $he = 2.8 + 1.2 * app('Helper')->calc_Vitesse_vent($climat->id);
                    break;
                case 2:
                    $he = 3.85 * app('Helper')->calc_Vitesse_vent($climat->id)^0.8;
                    break;
                case 3:
                    $he = 4.17 * app('Helper')->calc_Vitesse_vent($climat->id)^0.72;
                    break;
                case 4:
                    $he = 9.7 + 3.4 * app('Helper')->calc_Vitesse_vent($climat->id);
                    break;
                case 5:
                    $he = 5.7 + 3.8 * app('Helper')->calc_Vitesse_vent($climat->id);
                    break;
                case 6:
                    $he = 7.5 + 3.88 * app('Helper')->calc_Vitesse_vent($climat->id);
                    break;
            }
        }

        //dd($selected_he);

        $qch = [];
        $t_int = [];
        $ss = $serre->w * $serre->l;

        $datedebut->subDay();
        $chauffage = [];
        for ($k = 1; $k <= $nombre_jours; $k++)
        {
            $d = $datedebut->addDay();
           // for ($j = 0; $j < 24; $j++) {
               /* $chauffage[$j] = new Chauffage();

                $chauffage[$j]->date = $d;
                $chauffage[$j]->heure = 0;
                $chauffage[$j]->valeur = 0;
                $t_int[$j] = $t_hourly[$j] + ((0.017 * $rsh[$j] + 2.64) / (0.685 * app('Helper')->calc_Vitesse_vent($climat->id)^0.8 + 1));

                if ($t_int[$j] < $serre->tc) {
                    $qch[$j] = app('Helper')->calc_ac($serre->id) / $ss * ($he[$j] * ($tp[$j] - $t_hourly[$j]) - ($o * ($fps * ($t_hourly[$j] + 273) ^ 4 + $fpa * ($t_atm[$j] + 273) ^ 4 - ($tp[$j] + 273) ^ 4)))
                        + (0.35 * (app('Helper')->calc_volume_serre($serre->id) / $ss) * $r * ($serre->tc - $t_hourly[$j]) + 0.67 * ($serre->ctz * $rsh[$j]))
                        - ($serre->ctz * $rsh[$j]);
                } else {
                    $qch[$j] = 0;
                }

                $chauffage[$j]->heure = $j;
                $chauffage[$j]->valeur = $qch[$j];
                $chauffage[$j]->serre_id = $serre->id;
//                dd($chauffage[$j]);

                $chauffage[$j]->save();*/

           // }
            $j = 0;
            foreach ($t_hourly as $key=>$item)
            {
                $chauffage[$j] = new Chauffage();

                $chauffage[$j]->date = $d;
                $chauffage[$j]->heure = 0;
                $chauffage[$j]->valeur = 0;
                $t_int[$j] = $item + ((0.017 * $rsh[$key] + 2.64) / (0.685 * pow(app('Helper')->calc_Vitesse_vent($climat->id),0.8) + 1));

                if ($t_int[$j] < $serre->tc) {
                    $qch[$j] = app('Helper')->calc_ac($serre->id) / $ss * ($he[$j] * ($tp[$j] - $item) - ($o * ($fps * pow($item + 273,4)+ $fpa * pow($t_atm[$j] + 273,4) - pow($tp[$j] + 273,4))))
                        + (0.35 * (app('Helper')->calc_volume_serre($serre->id) / $ss) * $r * ($serre->tc - $item) + 0.67 * ($serre->ctz * $rsh[$key]))
                        - ($serre->ctz * $rsh[$key]);
                } else {
                    $qch[$j] = 0;
                }

                $chauffage[$j]->heure = "$key";
                $chauffage[$j]->valeur = $qch[$j];
                $chauffage[$j]->serre_id = $serre->id;
                $chauffage[$j]->tint = $t_int[$j];
                //dd($chauffage[$j]->heure);

                $chauffage[$j]->save();
                $j++;
            }
        }


        //return $qch;
        return redirect()->route('chauffage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $datedebutc = Carbon::parse($request->get('dated'))->format('d-m-Y');
        $datefin = $request->get('datef');
        $datedebut = Carbon::parse($datedebutc);
        $datefin = Carbon::parse($datefin);
        $nombre_jours = $datefin->diffInDays($datedebut) + 1;

        $climat = Climat::where('date_string','like','%'.$datedebutc.'%')->first();

        $chauffage = [];

        for ($i = 1;$i<= $nombre_jours;$i++)
        {
            $chauffage[$i] = Chauffage::where('serre_id',$request->serre)->get();
        }

        //dd($request->serre,$chauffage);

        return view('chauffage.show',['chauffages' => $chauffage, 'nombre_jours' => $nombre_jours, 'climat' => $climat]);
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function courbe(Request $request)
    {
        $datedebut = $request->get('dated');
        $datefin = $request->get('datef');
        $serre = Serre::findOrFail($request->serre);
        return view('chauffage.courbe');
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
