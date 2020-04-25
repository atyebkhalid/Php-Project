<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LIT Diamond | Order Detail</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo e(url('resources/admin')); ?>/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Left side column. contains the logo and sidebar -->

            <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Order Details</h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Order Details</li>
                    </ol>
                </section>

                <!-- Main content -->
                <?php echo e(Form::open(['url' => 'admin/orders', 'id' => 'myForm'])); ?>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Order Detail List</h3>
                                    <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="pull-right">
                                        
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Order Detail ID</th>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Cost Price</th>
                                                <th>Sale Price</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($Order_details as $od) {
                                                ?>
                                                <tr>
                                                    
                                                    <td><?php echo e($od->OrderDetailID); ?></td>
                                                    <td><?php echo e($od->OrderID); ?></td>
                                                    <td><?php echo e($od->ProductID); ?></td>
                                                    <td><?php echo e($od->CostPrice); ?></td>
                                                    <td><?php echo e($od->SalePrice); ?></td>
                                                    <td><?php echo e($od->Qty); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(url('resources/admin')); ?>/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('resources/admin')); ?>/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo e(url('resources/admin')); ?>/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
            $('#example1').DataTable()
                    $('#example2').DataTable({
            'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
            })
            })

            $(document).ready(function() {
                $('#chkAll').change(function() {
                    var res = $(this).is(':checked');
                    $('.chk').prop('checked', res);
                });
            });
            
            function doDelete() {
                if($('.chk').is(':checked')) {
                    if(confirm("Are you sure?")) {
                        $('#myForm').submit();
                    }
                } else {
                    alert("Please select record to delete.");
                }
            }
        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/admin/orders/order_details.blade.php ENDPATH**/ ?>