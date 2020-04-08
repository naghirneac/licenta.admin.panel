<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Blog\BaseController as MainBaseController;

abstract class AdminBaseController extends MainBaseController
{
    public function __construct()
    {
        //Allows only admin
        $this->middleware('auth');
        $this->middleware('status');
    }
}
