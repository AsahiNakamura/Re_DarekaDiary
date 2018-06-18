<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="user-scalable=no,width=480,maximum-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <link href="http://darekagakaku.herokuapp.com/feed" rel="alternate" title="feed" type="application/atom+xml">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <style>
    #main{
    max-width:600px;
    margin-left:auto;
    margin-right:auto;
      margin-bottom:5.5em;
    text-align:left;
  }
  #main h1{
      color: #333;
      margin: 1em 0 0.1em;
      font-size: 4.5em;
  }
  #main p{
      line-height: 1.5em;
  }
  #main .input-wrapper{
      margin-top: 0em;
  }
  #main .input-wrapper h2{
      color: #333;
      font-weight: 300;
      margin-bottom: 0.3em;
  }
  #main .input-wrapper textarea{
      position: relative;
      font-size: 1em;
      resize:none;
      width:100%;
      height:10em;
  }
  .right{
      text-align: right;
      margin-right: 0;
      width: 100%;
  }
</style>
</head>
<body>
    <div id="main">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
