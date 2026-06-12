<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Selendang Puan') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'DM Sans',sans-serif;background:#f5f0e8;min-height:100vh;display:flex;}

        .guest-left{
            width:42%;min-height:100vh;
            background:#2c3325;
            display:flex;flex-direction:column;
            justify-content:center;padding:60px 52px;
            position:relative;overflow:hidden;
            flex-shrink:0;
        }
        .guest-left::before{
            content:'';position:absolute;
            top:-80px;right:-80px;
            width:300px;height:300px;
            background:rgba(143,166,122,0.12);
            border-radius:50%;
        }
        .guest-left::after{
            content:'';position:absolute;
            bottom:-60px;left:-60px;
            width:220px;height:220px;
            background:rgba(143,166,122,0.07);
            border-radius:50%;
        }

        .brand-wrap{display:flex;align-items:center;gap:11px;margin-bottom:52px;position:relative;}
        .brand-logo{
            width:38px;height:38px;
            background:#8fa67a;border-radius:10px;
            display:flex;align-items:center;justify-content:center;
            color:#fff;font-family:'DM Serif Display',serif;
            font-size:17px;font-weight:600;
        }
        .brand-name{font-family:'DM Serif Display',serif;font-size:14px;color:#e8e0d0;line-height:1.3;}
        .brand-sub{font-size:10px;color:rgba(255,255,255,0.3);margin-top:1px;}

        .left-heading{
            font-family:'DM Serif Display',serif;
            font-size:34px;font-weight:400;
            color:#e8e0d0;line-height:1.2;
            margin-bottom:14px;letter-spacing:-0.5px;
            position:relative;
        }
        .left-heading em{font-style:italic;color:#a8c490;}
        .left-desc{
            font-size:14px;color:rgba(255,255,255,0.38);
            line-height:1.8;margin-bottom:44px;
            position:relative;max-width:320px;
        }

        .stat-row{display:flex;gap:12px;position:relative;}
        .stat-box{
            flex:1;padding:14px;
            background:rgba(255,255,255,0.04);
            border:1px solid rgba(255,255,255,0.07);
            border-radius:10px;
        }
        .stat-num{
            font-family:'DM Serif Display',serif;
            font-size:20px;color:#c8d9b0;
            margin-bottom:3px;
        }
        .stat-lbl{font-size:10px;color:rgba(255,255,255,0.28);text-transform:uppercase;letter-spacing:0.7px;}

        .guest-right{
            flex:1;display:flex;
            align-items:center;justify-content:center;
            padding:48px 40px;
        }
        .form-box{width:100%;max-width:400px;}

        @media(max-width:768px){
            body{flex-direction:column;}
            .guest-left{width:100%;min-height:auto;padding:36px 28px;}
            .left-heading{font-size:26px;}
            .guest-right{padding:32px 20px;}
        }
    </style>
</head>
<body>
    <div class="guest-left">
        <div class="brand-wrap">
            <div class="brand-logo">S</div>
            <div>
                <div class="brand-name">Selendang Puan</div>
                <div class="brand-sub">Dharma Ayu</div>
            </div>
        </div>
        <h1 class="left-heading">Suaramu Adalah<br><em>Kekuatan Kami.</em></h1>
        <p class="left-desc">Yayasan Selendang Puan Dharma Ayu menyediakan wadah aman bagi masyarakat Indramayu untuk melapor dan menciptakan lingkungan yang adil.</p>
        <div class="stat-row">
            <div class="stat-box">
                <div class="stat-num">Aman</div>
                <div class="stat-lbl">Terenkripsi</div>
            </div>
            <div class="stat-box">
                <div class="stat-num">24 Jam</div>
                <div class="stat-lbl">Respons Tim</div>
            </div>
            <div class="stat-box">
                <div class="stat-num">100%</div>
                <div class="stat-lbl">Rahasia</div>
            </div>
        </div>
    </div>

    <div class="guest-right">
        <div class="form-box">
            {{ $slot }}
        </div>
    </div>
</body>
</html>