<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getForm()
    {
        return view('form');
    }

    public function sendRequest(Request $request, $id=1)
    {
        dd($request->all());
    }


}
