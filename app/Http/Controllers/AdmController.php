<?php

namespace App\Http\Controllers;

use App\Admuser;
use Illuminate\Http\Request;

class AdmController extends Controller
{

    public function create()
    {
        return view('admnew');
    }
    public function store(Request $request)
    {
        $admuser = new Admuser();
        $admuser->name = $request->get('name');
        $admuser->email = $request->get('email');
        $admuser->password = $request->get('password');
        $admuser->save();
        return redirect('admuser')->with('success', 'Admin has been successfully added');
    }
}
