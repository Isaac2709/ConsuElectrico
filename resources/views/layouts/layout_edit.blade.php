<!DOCTYPE html>
<html lang="es" ng-app="iscrazyworldApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Isaac Pacheco Corella">

    <title>ISCrazyWorld | @yield('title_page')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- EDITOR -->
    <link href="/admin/bootstrap/bootstrap_extend.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

    <!-- bootstrap -->
    <link href="/admin/bootstrap/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="/admin/bootstrap/bootstrap3-editable/js/bootstrap-editable.js" rel="stylesheet" type="text/css"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/">ISCrazyWorld</a>
            </div>
            <!-- /.navbar-header -->

            @include('admin.layouts.layout_menu_top')
            <!-- /.navbar-top-links -->

            @include('admin.layouts.layout_menu_left')
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @yield('Open_form')
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title_page')</h1>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @yield('title_container')
                        </div>
                        <div class="panel-body">
                            @yield('container')
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                @yield('tags')
                </div>
            </div>
            @yield('Close_form')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="/admin/js/jquery.js"></script> -->
    <!-- <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <!-- <script src="/admin/js/plugins/metisMenu/metisMenu.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/admin/js/sb-admin-2.js"></script>
    <!-- EDIT -->


    <!-- <script src="/admin/scripts/common/jquery-1.7.min.js" type="text/javascript"></script> -->
    <script src="/admin/scripts/innovaeditor.js" type="text/javascript"></script>
    <script src="/admin/scripts/innovamanager.js" type="text/javascript"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>
    <script src="/admin/scripts/common/webfont.js" type="text/javascript"></script>

    <!-- Script PROPIO - Custom load data and properties handle { buttons, divs, labels, etc} -->
    <script type="text/javascript" src="/admin/js/myjs/edit_post.js"></script>
</body>

</html>
