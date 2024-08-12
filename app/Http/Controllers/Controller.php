<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $balances = MyHelpers::getBalance();
        return view('main',[
            'balances' => $balances
        ]);
    }
}