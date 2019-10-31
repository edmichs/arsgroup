<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>LE GRAND SERVICE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <style>
      @media print {
        .noprint { display : none; }
      }

      .page-break {
        page-break-after: always;
      }

      @include('Layouts.bluma-min-css')
    </style>
    @yield('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!--div class="wrapper"-->
    <div id="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      @yield('content')
      </div>
      <div class="page-break"></div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>
          Copyright &copy; LE GRAND SERVICE <small></small>
        </strong>
      </footer>

    </div>

  </body>
</html>
