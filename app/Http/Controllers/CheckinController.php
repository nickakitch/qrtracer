<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\User;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function create($user_uuid)
    {
        $business = User::where('uuid', $user_uuid)->firstOrFail();

        return view('checkin.new', ['business' => $business]);
    }

    public function store(Request $request, $user_uuid)
    {
        $business = User::where('uuid', $user_uuid)->firstOrFail();

        Checkin::create([
            'user_id' => $business->id,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'ip' => $request->ip()
        ]);

        return redirect()->route('checkin.success');
    }

    public function success()
    {
        return view('checkin.success');
    }
}
