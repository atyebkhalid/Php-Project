<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LIT Diamond | Edit Product</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ url('resources/admin') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('resources/admin') }}/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ url('resources/admin') }}/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('resources/admin') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('resources/admin') }}/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('admin.includes.header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.includes.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Products</h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                {{ Form::open(['url' => 'admin/products/edit/'.$Product->ProductID, 'files' => true]) }}
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New</h3>
                                    @include('admin.includes.alerts')
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="ProductName">Product Name</label>
                                                        {{ Form::text('ProductName', $Product->ProductName, ['class' => 'form-control', 'id' => 'ProductName', 'placeholder' => 'Enter Product Name']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="CostPrice">Cost Price</label>
                                                        {{ Form::text('CostPrice', $Product->CostPrice, ['class' => 'form-control', 'id' => 'CostPrice', 'placeholder' => 'Enter Cost Price']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="SalePrice">Sale Price</label>
                                                        {{ Form::text('SalePrice', $Product->SalePrice, ['class' => 'form-control', 'id' => 'SalePrice', 'placeholder' => 'Enter Sale Price']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Qty">Qty</label>
                                                        {{ Form::text('Qty', $Product->Qty, ['class' => 'form-control', 'id' => 'Qty', 'placeholder' => 'Enter Qty']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Desc">Desc</label>
                                                        {{ Form::textarea('Desc', $Product->Desc, ['class' => 'form-control', 'id' => 'Desc', 'placeholder' => 'Enter Desc']) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Setting</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Parent:</label>
                                                        {{ Form::select('CategoryID', $Categories, $Product->CategoryID, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status:</label>
                                                        <label>{{ Form::radio('Status', '1', ($Product->Status == "1" ? true : false)) }} Active</label>
                                                        <label>{{ Form::radio('Status', '0', ($Product->Status == "0" ? true : false)) }} Inactive</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Product Image *:</label>
                                                        <input type="file" name="Image" />
                                                        
                                                        <img src="{{ url('public/uploads/products/'.$Product->Image) }}" width="100%" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.box -->

                            <!-- Form Element sizes -->

                            <!-- /.box -->


                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                {{ Form::close() }}
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('admin.includes.footer')

            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ url('resources/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ url('resources/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{ url('resources/admin') }}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('resources/admin') }}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('resources/admin') }}/dist/js/demo.js"></script>
    </body>
</html>
