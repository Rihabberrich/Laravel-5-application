<?php

namespace App\Helpers;

use App\Models\Climat;
use App\Models\Serre;
use App\Models\Zone;

/**
 * @param $id
 * @return int
 */
class General
{
    /**
     * @param $id
     * @return mixed
     */
    public function calc_Vitesse_vent($id)
    {

        $c = Climat::findOrFail($id);
        $serre = Serre::where('zone_id',$c->zone_id)->first();
        $zone = Zone::where('id',$c->zone_id)->first();
        $vmes = $c->vmes;
        $alpha = $serre->alpha;
        $beta = $serre->beta;
        $h = $serre->h;
        $alpha_mes = $zone->alpha;
        $beta_mes = $zone->beta;
        $h_mes = $c->hmes;
       // dd($alpha*(pow($h/10,$beta)));
        $v = $vmes *( ($alpha*(pow($h/10,$beta)))/($alpha_mes*(pow($h_mes/10,$beta_mes))));
       // dd($vmes);
        return $v;

    }

    /**
     * @param $id
     * @return float
     */
    public function calc_ra($id)
    {
        $climat = Climat::findOrFail($id);
        $nbj = $climat->date;
        $zone = Zone::where('id',$climat->zone_id)->first();
        $lat = $zone->latitude;
        $lat_rad = $lat * (3.14/180);
        $dec_so = 0.409*sin(((2*3.14*$nbj)/365)-1.39);
        //dd($lat_rad);
        $gsc = 0.0820;
        $dr = 1 + 0.033 * cos ((2*3.14*$nbj)/365);
        //dd($dr);
        $ws = acos(-tan($lat_rad)-tan($dec_so));
        //dd($ws);
        $ra = (24*60*$gsc*$dr*($ws*sin($dec_so)*sin($lat_rad)+cos($dec_so)*cos($lat_rad)*sin($ws)))/3.14;
        return ($ra*pow(10,6)/(24*3600));
    }

    /**
     * @param $id
     * @return float
     */
    public function calc_rsd($id)
    {
        $climat = Climat::findOrFail($id);
        $nbj = $climat->date;
        $zone = Zone::where('id',$climat->zone_id)->first();
        $lat = $zone->latitude;
        $lat_rad = $lat * (3.14/180);
        $dec_so = 0.409*sin(((2*3.14*$nbj)/365)-1.39);
        //dd($lat_rad);
        $gsc = 0.0820;
        $dr = 1 + 0.033 * cos ((2*3.14*$nbj)/365);
        //dd($dr);
        $ws = acos(-tan($lat_rad)-tan($dec_so));
        $duree_jour = (24 * $ws)/3.14;
        if ($climat->rs != 0)
        {
            return $climat->rs;
        }
        else
        {
            if ($climat->dinst != 0)
            {
                $rs = (0.25 + 0.5 * ($climat->dinst/$duree_jour))*$this->calc_ra($id);
                return $rs;
            }
            else
            {
                $krs = $climat->krs;
                $tmax = $climat->tmax;
                $tmin = $climat->tmin;
                $rs = $krs * sqrt($tmax-$tmin)*$this->calc_ra($id);
                return $rs;
            }
        }
        //dd($climat->rs);
    }

    /**
     * @param $id
     * @return array
     */
    public function calc_t_hourly($id)
    {
        $tab_t_hourly = [];

        $climat = Climat::findOrFail($id);
        $zone = Zone::where('id',$climat->zone_id)->first();
        $nbj = $climat->date;
        $lat = $zone->longitude;
        $lat_rad = $lat * (3.14/180);
        $dec_so = 0.409*sin(((2*3.14*$nbj)/365)-1.39);
        //dd($lat_rad);
        $gsc = 0.0820;
        $dr = 1 + 0.033 * cos ((2*3.14*$nbj)/365);
        //dd($dr);
        $ws = acos(-tan($lat_rad)-tan($dec_so));

        $heure_lev=12-($ws*(180/3.14)/15);
        $heure_couch=12+($ws*(180/3.14)/15);
        $t_hourly = [];
        $t_hourly["$heure_lev"] = 0;
        for ($i = 0; $i<23; $i++)
        {
            if ($heure_lev > 23)
            {
                $heure_lev = 0 + $heure_lev - floor($heure_lev);
            }
            else
            {
                $heure_lev = $heure_lev + 1;
                //dd($heure_lev);
                $t_hourly["$heure_lev"] = 0;
               // dd($t_hourly);
            }

        }

        $duree_jour = (24 * $ws)/3.14;
        $tmin = $climat->tmin;
        $tmax = $climat->tmax;
        $temp_moy_ext = ($tmin+$tmax)/2;
        $x = ($duree_jour/2)+1;
        $i = 0;
        for ($i = 0; $i < 24 ; $i++)
        {
            if (($i >= 0) && ($i<$x))
            {
                $temp_ext = $temp_moy_ext-(($tmax-$tmin)/2)*cos((3.14*$i)/$x);
                $tab_t_hourly[$i] = $temp_ext;
            }
            else
            {
                $temp_ext=$temp_moy_ext+(($tmax-$tmin)/2)*cos((3.14*($i-$x))/(24-$x));
                $tab_t_hourly[$i] = $temp_ext;
            }
        }

        $k = 0;
        foreach ($t_hourly as $key=>$item)
        {
            $t_hourly[$key] = $tab_t_hourly[$k];
            $k++;
        }

        return $t_hourly;
    }

    /**
     * @param $id
     * @return array
     */
    public function calc_rs_hourly($id)
    {
        $climat = Climat::findOrFail($id);
        $zone = Zone::where('id',$climat->zone_id)->first();
        $nbj = $climat->date;
        $lat = $zone->longitude;
        $lat_rad = $lat * (pi()/180);
        $dec_so = 0.409*sin(((2*pi()*$nbj)/360)-1.39);
        $gsc = 0.0820;
        $dr = 1 + 0.033 * cos ((2*pi()*$nbj)/360);
        $ws = acos(-tan($lat_rad)-tan($dec_so));

        $heure_lev=12-($ws*(180/pi())/15);
        $heure_couch=12+($ws*(180/pi())/15);
        $t_hourly = $this->calc_t_hourly($id);

        $a = 0.409 + 0.5016 * sin($ws - (3.14/3));
        $b = 0.6609 + 0.4767 * sin($ws-(3.14/3));
        $rt = [];
        $w = [];
        $rs_hourly = [];
        foreach ($t_hourly as $key=>$item)
        {

            if (($key > $heure_lev)&&($key<$heure_couch))
            {
                $w[$key] = 15 * (12 - $key) * (3.14/180);
                $rt[$key] = (3.14/24)*($a + $b * cos($w[$key]))*((cos($w[$key])-cos($ws))/(sin($ws)-$ws*cos($ws)));
                $rs_hourly[$key] = $rt[$key] * $this->calc_rsd($id);
            }
            else
            {
                $rs_hourly[$key] = 0;
            }
            //dd($heure_couch);
        }


        return $rs_hourly;

    }

    public function calc_volume_serre($id)
    {
        $serre = Serre::findOrFail($id);
        if ($serre->type == 1)
        {
            $vs = (($serre->w * $serre->e) + (0.5 * 3.14 * pow($serre->h - $serre->e,2)) * $serre->l * $serre->nb);
            return $vs;
        }
        else if ($serre->type == 2)
        {
            $vs = (($serre->w * $serre->e)+(1/2 * ($serre->h - $serre->e) * $serre->w) * $serre->nb) * $serre->l;
            return $vs;
        }

    }

    /**
     * @param $id
     * @return int
     */
    public function calc_ac($id)
    {
        $serre = Serre::findOrFail($id);
        if ($serre->type == 1)
        {
            $ac = 2 * $serre->l * $serre->w + (2 * $serre->w * $serre->e + 3.14 * pow($serre->h - $serre->e,2) + 3.14 * ($serre->h - $serre->e) * $serre->l) * $serre->nb ;
            //echo "type 1";
            return $ac;
        }
        else if ($serre->type == 2)
        {
            $ac = 2 * $serre->l * $serre->w + ($serre->w * $serre->e * 2 + $serre->w * ($serre->h - $serre->e) * $serre->d * $serre->l * 2) * $serre->nb;
           // echo "type 2";
            return $ac;
        }
    }
}