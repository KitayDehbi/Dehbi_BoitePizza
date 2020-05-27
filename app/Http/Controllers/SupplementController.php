<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplement;
class SupplementController extends Controller
{
    public function index(){
        $supplements = Supplement::all();
        
        return view ("supplement/home", [
            'supplements' =>$supplements
        ]);
    }
}
