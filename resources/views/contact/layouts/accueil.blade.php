<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SGBF | SIMULATEUR </title>
    <!-- favicon -->	
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo.png')}}"/>

    <!-- Bootstrap -->
    <link href="{{asset('admin/source/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/source/bootstrap/less/glyphicons.less')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/source/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/source/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/source/iCheck/green.css')}}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('admin/source/google-code-prettify/prettify.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('admin/source/select2/select2.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('admin/source/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('admin/source/starrr/starrr.css" rel="stylesheet')}}">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/source/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- full calendar -->
    <link rel="stylesheet" href="{{asset('admin/source/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/source/fullcalendar/fullcalendar.print.css')}}" media="print">
     <!-- Datatables -->    
    <link href="{{asset('admin/source/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/source/datatables/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/source/datatables/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/source/datatables/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/source/datatables/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!--/Datatables -->
    <!-- Style -->        
      <link href="{{asset('css/adminStyle.css')}}" rel="stylesheet">
    <!-- /Style -->

    <!-- Notify -->
    @notifyCss
    <!--/ Notify -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('admin.')}}" class="site_title"><i class="fa fa-home"></i> <span>Simulateur !</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Bienvenue, <strong>{{ Auth::user()->name }}</strong></span>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
              
            @include('contact.layouts.partials.menu')


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        @include('contact.layouts.partials.top_menu')

        {{-- @include('notify::messages') --}}
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('header')
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@yield('titre')</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        @include('notify::messages')                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right w-100">
            Admin by <a href="{{route('admin.')}}">Société Générale Burkina Faso</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery --> 
    <script src="{{asset('admin/source/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('admin/source/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/source/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/source/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('admin/source/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/source/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('admin/source/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/source/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('admin/source/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('admin/source/jquery/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('admin/source/google-code-prettify/prettify.min.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('admin/source/jquery/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('admin/source/switchery/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin/source/select2/select2.full.min.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('admin/source/autosize/dist/autosize.min.js')}}"></script>
    <!-- starrr -->
    <script src="{{asset('admin/source/starrr/starrr.js')}}"></script>    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin/build/js/custom.min.js')}}"></script>
    <!-- Print page -->    
    <script src="{{asset('admin/build/js/jQuery.print.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('admin/source/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/source/datatables/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/source/datatables/pdfmake/build/vfs_fonts.js')}}"></script>
    <!--/ Datatables -->
    <!--/ Datatables -->
    @yield('script')
    <!-- Notify -->
    @notifyJs
        <!--/ Notify -->
  
  </body>
</html>