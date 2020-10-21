<?php

namespace Tests\Feature;

use App\ClassLibrary\Utilities;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class QRTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake();
        Session::start();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_a_qr_code_can_be_saved_as_a_pdf()
    {
        $url = 'some_url';
        Utilities::qrCodeImageUrl($url);
        $filename = md5($url) . '.png';

        Storage::disk()->assertExists('public/' . $filename);
    }
}
