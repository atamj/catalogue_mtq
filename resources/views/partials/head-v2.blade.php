<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta content="{{$title}}" property="og:title">
    <meta content="{{$title}}" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SMNYFQX46B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{$client->gtag}}');
    </script>
    <style>
        :root {
            --primary: {{$pivot->primary_color}};
            --secondary: {{$pivot->secondary_color}};
            --header_color: {{$pivot->header_color}}
        }
    </style>
    <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/webflow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style-v2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/laflow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/custom-v2.css')}}" rel="stylesheet" type="text/css">
    <style>
        {!! $pivot->css !!}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({google: {families: ["Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic"]}});</script>
    <script src="https://use.typekit.net/fgx4vnp.js" type="text/javascript"></script>
    <script type="text/javascript">try {
            Typekit.load();
        } catch (e) {
        }</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="{{asset('storage/clients/'.$client->id.'/favicon/favicon.png')}}" rel="shortcut icon"
          type="image/x-icon">
    <link href="{{asset('storage/clients/'.$client->id.'/favicon/favicon.png')}}" rel="apple-touch-icon">
</head>
