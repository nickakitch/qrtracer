<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Tracing Poster</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            padding-top: 30px;
        }
        h1 {
            font-size: 72px;
        }
        p {
            font-size: 24px;
        }
        img {
            margin-top: 50px;
            margin-bottom: 20px;
        }
        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Please Scan Below</h1>
    <p>Record your attendance for contact tracing purposes.</p>
    <img src="{{ $qr_url }}" alt="{{ route('checkin.create', ['user_uuid' => auth()->user()->uuid]) }}">
    <p>Or go to <span style="color:gray">{{ route('checkin.create', ['user_uuid' => auth()->user()->uuid]) }}</span></p>
    <div class="footer">
        Qrtracer.org<br>
        <strong>Free</strong> COVID-19 contact tracing for small businesses.
    </div>
</body>
</html>
