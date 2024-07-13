<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    //
    public function securePolicy()
    {
        $policy = Policy::where('group', 'secure')->first();
        return view('main.policies.secure', compact('policy'));
    }
    public function servicePolicy()
    {
        $policy = Policy::where('group', 'service')->first();
        return view('main.policies.service', compact('policy'));
    }
    public function returnPolicy()
    {
        $policy = Policy::where('group', 'return')->first();
        return view('main.policies.return', compact('policy'));
    }
}
