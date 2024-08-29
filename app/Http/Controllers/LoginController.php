<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('home.index');
    }


    public function home()
    {
        return view('admin.adminhome');
    }

    public function getusers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function userbyid($id)
    {
        $userbyid = User::find($id);

        if ($userbyid) {
            return response()->json([
                'success' => true,
                'message' => 'User retrieved successfully.',
                'data' => $userbyid
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }
    }




}
