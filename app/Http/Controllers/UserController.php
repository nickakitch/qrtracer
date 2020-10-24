<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class UserController extends Controller
{
    public function edit()
    {
        return view('dashboard.settings', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateUserProfileRequest $request)
    {
        $user = auth()->user();

        $user->business_name = $request->input('business_name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('settings.index')->with(['alert-success' => 'Your information has been updated.']);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = auth()->user();

            if (!Auth::attempt(['email' => $user->email, 'password' => $request->input('current_password')])) {
                throw new Exception('The current password you entered is incorrect.');
            }

            $user->password = Hash::make($request->input('password'));
            $user->save();
            $response = ['alert-success' => 'Your password was updated.'];

        } catch (Exception $error) {
            $response = ['alert-danger' => $error->getMessage()];
        } finally {
            return redirect()->route('settings.index')->with($response);
        }
    }
}
