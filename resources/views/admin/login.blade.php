<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Service | Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('back-end/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back-end/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back-end/css/matrix-login.css') }}" />
    <link href="{{ asset('back-end/fonts/css/font-awesome.css') }}" rel="stylesheet }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('back-end/images/image.png') }}" type="image/png">
</head>
<body>
    <div id="loginbox"> 
    @if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{!! session('flash_message_error') !!} </strong>
    </div>
    @endif
    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{!! session('flash_message_success') !!} </strong>
    </div>
    @endif 
        <form id="loginform" class="form-vertical" method="post" action="{{ url('admin') }}">  {{ csrf_field() }}

			 <div class="control-group normal_text"> <h3><img src="{{ asset('back-end/images/logo.png') }}" alt="Logo" /></h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="code" placeholder="Customer Code" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                <span class="pull-right"><input type="submit" value="Login" class="btn btn-success"></span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
			<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
			
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>
           
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
            </div>
        </form>
    </div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('back-end/js/jquery.min.js') }}"></script>  
<script src="{{ asset('back-end/js/matrix.login.js') }}"></script>
<script src="{{ asset('back-end/js/bootstrap.min.js') }}"></script> 
</body>

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

</html>
