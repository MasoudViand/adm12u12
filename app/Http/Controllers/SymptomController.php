<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index()
    {
      //  $symptoms=Symptom::take(500)->get();
        return view('admin.symptom');
    }

    //edit

    public function edit($id)
    {
        $symptom = Symptom::find($id);
        return view('admin/symptomedit',compact('symptom','id'));
    }

    // update


    public function update(Request $request, $id)
    {
        $symptom= Symptom::find($id);
        $symptom->name = $request->get('name');
        $symptom->displayname = $request->get('displayname');
        $symptom->status = $request->get('status');
        $symptom->brief = $request->get('brief');
        $symptom->frequency = $request->get('frequency');
        $symptom->severity = $request->get('severity');
        $symptom->save();
        return redirect('admin/symptom')->with('success', 'Item has been successfully update');
    }
    public function destroy($id)
    {
        $symptom = Symptom::find($id);
        $symptom->delete();
        return redirect('admin/symptom')->with('success','Item has been  deleted');
    }

    public function create()
    {
        return view('admin/symptomcreate');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            '_id' => 'required|unique:symptom_new|size:11',
            'name' => 'required',
            'displayname' => 'required',
            'status' => 'required|integer|size:1'
        ]);
        $symptom = new Symptom();
        $symptom->_id = $request->get('_id');
        $symptom->name = $request->get('name');
        $symptom->displayname = $request->get('displayname');
        $symptom->status = $request->get('status');
        $symptom->brief = $request->get('brief');
        $symptom->frequency = $request->get('frequency');
        $symptom->severity = $request->get('severity');
        $symptom->save();
        return redirect('admin/symptom')->with('success', 'Item has been successfully added');
    }
}
