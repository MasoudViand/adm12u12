<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{


    public function index()
    {
       // $activities=Activity::All();
        return view('admin/activity');
    }


    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('admin/activityedit',compact('activity','id'));
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
      //  $activity->_id = $request->get('id');
        $activity->name = $request->get('name');
        $activity->name_full = $request->get('name_full');
        $fromunit = $request->get('unit');
        $fromunit = explode(",", $fromunit);
        $activity->unit = $fromunit;
        $activity->save();
        return redirect('admin/activity')->with('success', 'Activity has been successfully updated');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('admin/activity')->with('success','Item has been deleted');
    }
    public function create()
    {
        return view('admin/activitycreate');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            '_id' => 'required|unique:activity|size:11',
            'name' => 'required',
            'name_full' => 'required',
        ]);
        $activity = new Activity();
        $activity->_id = $request->get('_id');
        $activity->name = $request->get('name');
        $activity->name_full = $request->get('name_full');
        $fromunit = $request->get('unit');
        $fromunit = explode(",", $fromunit);
        $activity->unit = $fromunit;
        $activity->save();
        return redirect('admin/activity')->with('success', 'Activity has been successfully added');
    }


}
