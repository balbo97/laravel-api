<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //CREAZIONE DEL METODO CHE MI RESTITUISCE LA VIEW PRINCIPALE DI ATTERRAGGIO 
    public function index(){
        return view('dashboard');
    }
}
