<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="user-scalable=no,width=480,maximum-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <link href="http://darekagakaku.herokuapp.com/feed" rel="alternate" title="feed" type="application/atom+xml">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="main">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
