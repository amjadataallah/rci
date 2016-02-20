<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>RCI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Redcrow Int.">

    <!-- Le styles -->
    <link href="{{ URL::asset('/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/main.css') }}" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <!-- DATA TABLE CSS -->
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet">



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ URL::asset('/assets/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('/assets/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('/assets/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('/assets/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/assets/ico/apple-touch-icon-57-precomposed.png') }}">

  	<!-- Google Fonts call. Font Used Open Sans -->
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <script type="text/javascript" src="{{ URL::asset('/assets/js/datatables/jquery.dataTables.js') }}"></script>
    

    
  </head>
  <body>
  
  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"> RedCrow</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{url('/')}}"><i class="icon-home icon-white"></i> Home</a></li>
              <li><a href="{{url('users')}}"><i class="icon-user icon-white"></i> User</a></li>
              <li><a href="{{url('auth/logout')}}"><i class="icon-user icon-white"></i> Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>
    <div class="container">
      @yield('content')
    </div> <!-- /container -->
    	
    <!-- FOOTER -->	
    <div id="footerwrap">
    <footer class="clearfix"></footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
            <p><img src="{{ URL::asset('/assets/img/logo_red_crow.png') }}" alt=""></p>
            <p>RedCrow Interlegence - Copyright 2014</p>
            </div>
        </div><!-- /row -->
    </div><!-- /container -->		
    </div><!-- /footerwrap -->


    <!--  javascript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/bootstrap.js') }}"></script>
    <!--<script type="text/javascript" src="{{ URL::asset('/assets/js/admin.js') }}"></script>-->
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery.jeditable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery.jeditable.datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/bootbox.min.js') }}"></script>
    
    <script type="text/javascript" charset="utf-8">
        $("body").on('click', '.delete', function () {
            v = $(this).attr('data-id');
            console.log('ssss');
            bootbox.confirm("This action can not be inversed, Are you sure you want to delete this record?", function (result) {
                if (result) {
                    window.location.href = "<?php echo url('users/delete/'); ?>" + "/" + v;
                } 
            });
        });
        $(function() {
            $( "#DateOfBirth" ).datepicker();
          });
        $(document).ready(function() {
            $('#dt1').dataTable();
            $('.date_editable').editable('<?php echo url("editable"); ?>', {
                type    : 'datepicker',
                indicator : 'Saving...',
                submitdata : {_token: $('input[name=_token]').val()},
            });
            $('.text_editable').editable('<?php echo url("editable"); ?>', {
                indicator : 'Saving...',
                submitdata : {_token: $('input[name=_token]').val()},
//                                    callback : function(value, settings) {
//                                        console.log(this);
//                                        console.log(value);
//                                        console.log(settings);
//                                    }
            });
        } );
    </script>

  
</body></html>