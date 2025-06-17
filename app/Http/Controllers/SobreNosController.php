<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Routing\Controller as BaseController;

class SobreNosController extends BaseController
{
    public function __construct(){
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function sobreNos(){
        return view('site.sobre-nos');
    }
}

