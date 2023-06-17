<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<x-import.tinymce-config />
<title>Drogeham</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{URL::asset("./css/app.css")}}" />
<link rel="icon" href="{{URL::asset("./img/favicon.ico")}}">
<script defer src="{{URL::asset("./js/app.js")}}"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src='fullcalendar/dist/index.global.js'></script>
<script src='fullcalendar/locale/nl.js'></script>

<meta name="csrf-token" content="{{ csrf_token() }}">