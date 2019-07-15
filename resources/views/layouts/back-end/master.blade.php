<!DOCTYPE html>
<html lang="en">
<head>
<title>CUSTOMER | Service</title>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="shortcut icon" href="{{ asset('back-end/images/image.png') }}" type="image/png">
<link rel="stylesheet" href="{{asset('back-end/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/matrix-media.css')}}" />
<link rel="stylesheet" href="{{asset('back-end/css/jquery.gritter.css')}}" />
<link href="{{ asset('back-end/fonts/css/font-awesome.css') }}" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">



</head>
<body>


@include('layouts.back-end.header')
@include('layouts.back-end.sidebar')
@yield('content')
@include('layouts.back-end.footer')





<script src="{{asset('back-end/js/jquery.min.js')}}"></script> 
<script src="{{asset('back-end/js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('back-end/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('back-end/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('back-end/js/select2.min.js')}}"></script>
<script src="{{asset('back-end/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('back-end/js/jquery.validate.js')}}"></script> 
<script src="{{asset('back-end/js/matrix.js')}}"></script> 
<script src="{{asset('back-end/js/matrix.form_validation.js')}}"></script>
<script src="{{asset('back-end/js/matrix.tables.js')}}"></script>
<script src="{{asset('back-end/js/matrix.popover.js')}}"></script>
 

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>


</body>
</html>
