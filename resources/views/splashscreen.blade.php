<!-- resources/views/splash.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison Burro</title>
    <link rel="stylesheet" href="{{ asset('css/splashscreen.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="splash-container">
    <div class="logo-wrapper">
        <div class="logo" id="logo">Maison Burro</div>
        <div class="sub-logo" id="sub-logo">バターケーキ</div>
    </div>
    <div class="paw-loader" id="paw-loader">
        <div class="paw"><i class="fas fa-paw"></i></div>
        <div class="paw"><i class="fas fa-paw"></i></div>
        <div class="paw"><i class="fas fa-paw"></i></div>
        <div class="paw"><i class="fas fa-paw"></i></div>
        <div class="paw"><i class="fas fa-paw"></i></div>
    </div>
    <div class="loading-text" id="loading-text">Loading...</div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
