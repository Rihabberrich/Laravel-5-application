<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerreRequest;
use App\Models\Serre;
use App\Models\Zone;
use Illuminate\Http\Request;

use App\Http\Requests;

class SerreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('zone'))
        {
            $serres = Serre::where('zone_id', 'like', '%' . $request->get('zone') . '%')->get();
           // dd($request->get('zone'));
        }else{
            $serres = Serre::all();
        }

        $zones = Zone::all();
        return view('serre.index', ['serres' => $serres ,
        'zones' => $zones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('serre.create', ['zones' => $zones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\SerreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerreRequest $request)
    {
        $alpha = $request->enviroment_alpha;
        $beta = $request->enviroment_beta;

       /* switch ($request->get('envirenement')) {
            case 1:
                $alpha = 0.1;
                $beta  = 1.3;
                break;
            case 2:
                $alpha = 1.15;
                $beta  = 1;
                break;
            case 3:
                $alpha = 0.2;
                $beta  = 0.85;
                break;
            case 4:
                $alpha = 0.25;
                $beta  = 0.67;
                break;
            case 5:
                $alpha = 0.35;
                $beta  = 0.47;
                break;
            default:
                $alpha = null;
                $beta  = null;
                break;
        }*/
       // dd($envirenement['alpha']);
       // dd($alpha,$beta);
        $serre = new Serre();
        $serre->name = $request->get('name');
        $serre->zone_id = $request->get('zone_id');
        $serre->nbr = $request->get('nbr');
        $serre->ctz = $request->get('ctz');
        $serre->c = $request->get('c');
        $serre->w = $request->get('w');
        $serre->l = $request->get('l');
        $serre->h = $request->get('h');
        $serre->e = $request->get('e');
        $serre->d = $request->get('d');
        $serre->tc = $request->get('tc');
        $serre->hvouv = $request->get('hvouv');
        $serre->stouv = $request->get('stouv');
        $serre->srf = $request->get('srf');
        $serre->ssd = $request->get('ssd');
        $serre->y = $request->get('y');
        $serre->alpha = $alpha;
        $serre->beta = $beta;
        $serre->type = $request->get('type');
        $serre->save();
        /*Serre::create([
            'name'          => $request->get('name'),
            'zone_id'       => $request->get('zone_id'),
            'nbr'           => $request->get('nbr'),
            'ctz'           => $request->get('ctz'),
            'c'             => $request->get('c'),
            'w'             => $request->get('w'),
            'l'             => $request->get('l'),
            'h'             => $request->get('h'),
            'e'             => $request->get('e'),
            'd'             => $request->get('d'),
            'tc'            => $request->get('tc'),
            'hvouv'         =>$request->get('hvouv'),
            'stouv'         =>$request->get('stouv'),
            'srf'           =>$request->get('srf'),
            'ssd'           =>$request->get('ssd'),
            'y'             =>$request->get('y'),
            'alpha'         =>$alpha,
            'beta'          =>$beta
        ]);*/

        return redirect()->route('serre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Serre $serre)
    {
        $zones = Zone::all();
        return view('serre.show', ['serre' => $serre, 'zones' => $zones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serre $serre)
    {
        $zones = Zone::all();
        return view('serre.edit', ['serre' => $serre, 'zones' => $zones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serre $serre)
    {
        $envirenement = $this->getEnvirenement($request->get('envirenement'));
        $serre->update(array_merge([
            'name'          => $request->get('name'),
            'zone_id'       => $request->get('zone_id'),
            'nbr'           => $request->get('nbr'),
            'ctz'           => $request->get('ctz'),
            'c'             => $request->get('c'),
            'w'             => $request->get('w'),
            'l'             => $request->get('l'),
            'h'             => $request->get('h'),
            'e'             => $request->get('e'),
            'd'             => $request->get('d'),
            'tc'            => $request->get('tc'),
        ], $envirenement));
        return redirect()->route('serre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serre $serre)
    {
        $serre->delete();
        return redirect()->route('serre.index');
    }
}
