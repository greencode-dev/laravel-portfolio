<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
            // return "sono nella index dell'amministrazione";
            return Auth::user()->name;
    }

    public function profile() {
        return "sono nella pagina di profilo dell'amministrazione";
    }
}
