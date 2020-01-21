<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $q = request()->get('search');
        $users = User::where('name', 'LIKE', '%' . $q . '%')->get();
        return view('search.index')->with('users', $users);
    }
}
