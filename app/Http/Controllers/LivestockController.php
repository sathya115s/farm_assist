<?php

namespace App\Http\Controllers;

use App\Models\Livetock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function show_livestock(){
        return view('admin.livestock');
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required|string',
            'birthdate'=>'required|date',
            'color'=>'required',
            'vaccinated_date'=>'required|date',
            'feeding_time'=>'required',
            'gender'=>'required|string'
        ]);

        $add=new Livetock();
        $add->name=$request->name;
        $add->birthdate=$request->birthdate;
        $add->color=$request->color;
        $add->vaccinated_date=$request->vaccinated_date;
        $add->feeding_time=$request->feeding_time;
        $add->gender=$request->gender;
        $add->save();

        return response()->json(['message'=>'Caatle added successfully']);
        
    }

    public function show(){
        $show=Livetock::all();
         return response()->json([
                'success' => true,
                'messgae' => 'categroy fetched ',
                'show' => $show,
            ]);
    }
}
