<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getEnvirenement($index)
    {
        switch ($index) {
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
        }

        return [
            'alpha' => $alpha,
            'beta'  => $beta,
        ];
    }
}
