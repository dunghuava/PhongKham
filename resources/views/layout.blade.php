<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{@csrf_token()}}">
    <link rel="stylesheet" href="{{mix('/css/common.css')}}">
    <title>Index</title>
</head>
<body class="sidebar-mini control-sidebar-slide-open layout-fixed layout-navbar-fixed">
    <div id="app"></div>
    <script src="{{mix('js/common.js')}}"></script>
</body>
</html>
