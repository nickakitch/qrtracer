<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckinRequest;
use App\Models\Checkin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class CheckinController extends Controller
{
    public function index(Request $request)
    {
        User::where('id', auth()->user()->id)->update(['timezone' => $request->input('timezone')]);
        $timezone = $request->input('timezone') ?? auth()->user()->timezone;

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=checkin_list.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $checkins = Checkin::where('user_id', auth()->user()->id);

        if (!empty($request->input('from'))) {
            $checkins->where('created_at', '>', Carbon::parse($request->input('from'))->setTimezone($timezone));
        }

        if (!empty($request->input('until'))) {
            $checkins->where('created_at', '<', Carbon::parse($request->input('until'))->setTimezone($timezone));
        }

        $checkins = $checkins->get();
        $columns = ['Name', 'Phone', 'Email', 'Date', 'Time'];

        $callback = function() use ($checkins, $columns, $timezone) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($checkins as $checkin) {
                fputcsv($file, [
                    htmlentities($checkin->name),
                    htmlentities($checkin->phone),
                    htmlentities($checkin->email),
                    htmlentities($checkin->created_at->setTimezone($timezone)->format('d M Y')),
                    htmlentities($checkin->created_at->setTimezone($timezone)->format('H:i'))
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function create($user_uuid)
    {
        $business = User::where('uuid', $user_uuid)->firstOrFail();

        return view('checkin.new', ['business' => $business]);
    }

    public function store(CheckinRequest $request, $user_uuid)
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
