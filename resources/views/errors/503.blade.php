<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>.: @yield('tittle','Admin Store') :.</title>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('admin/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/animate.min.css') }}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/icheck/flat/green.css') }}" rel="stylesheet">


  <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">

    <div class="main_container">

      <!-- page content -->
      <div class="col-md-12">
        <div class="col-middle">
          <div class="text-center text-center">
            <h1 class="error-number">!!!503</h1>
            <h2>Lo sentimos temporalmente no podemos mostrarte esta p&aacutegina</h2>
            <p>Este sitio est&aacute en mantenimiento <a href="#"></a>
            </p>
            
          </div>
        </div>
      </div>
      <!-- /page content -->

    </div>
    <!-- footer content -->
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

  <!-- bootstrap progress js -->
  <script src="{{ asset('admin/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
  <!-- icheck -->
  <script src="{{ asset('admin/js/icheck/icheck.min.js') }}"></script>

  <script src="{{ asset('admin/js/custom.js') }}"></script>
  <!-- pace -->
  <script src="{{ asset('admin/js/pace/pace.min.js') }}"></script>
  <!-- /footer content -->
</body>

</html>
