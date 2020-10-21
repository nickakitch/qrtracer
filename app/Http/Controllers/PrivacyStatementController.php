<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrivacyStatementRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PrivacyStatementController extends Controller
{
    public function edit(PrivacyStatementRequest $request)
    {
        User::where('id', auth()->user()->id)
            ->update([
                'privacy_statement' => $request->input('message'),
                'privacy_url' => $request->input('url')
            ]);

        return redirect()->route('dashboard')->with(['alert-success' => 'Success. Your privacy message and url are saved.']);
    }
}
