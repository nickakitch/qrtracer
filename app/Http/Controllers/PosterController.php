<?php

namespace App\Http\Controllers;

use App\ClassLibrary\Utilities;
use PDF;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function store(Request $request)
    {
        $qr_url = asset(Utilities::qrCodeImageUrl(route('checkin.create', ['user_uuid' => auth()->user()->uuid])));
        $pdf = PDF::loadView('pdf.poster', [
            'qr_url' => $qr_url
        ]);

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->download('qr_tracing_poster.pdf');
    }
}
