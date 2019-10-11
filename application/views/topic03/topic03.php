<body>
    <div class="wrapper">
        <!-- TopNav and SideNav here -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Topic 03
                    <small>PHP CodeIgniter and JQuery AJAX append table row using jquery and insert all table data to database (Working)</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Topic 02</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->            
                    <form action="javascript:void(0)" method="post" id="insert_form" name="insert_form" >
                        <div class="box-body">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No.</label>
                                    <input type="text" class="form-control" value="1" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Employee Fullname</label>
                                    <input type="text" class="form-control input_employee_name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control input_address">
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No.</label>
                                    <input type="text" class="form-control" value="2" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Employee Fullname</label>
                                    <input type="text" class="form-control input_employee_name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control input_address">
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No.</label>
                                    <input type="text" class="form-control" value="3" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Employee Fullname</label>
                                    <input type="text" class="form-control input_employee_name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control input_address">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Reset</button>
                            <button type="submit" id="btnSubmit" class="btn btn-success pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                    </div>
                    <div class="col-md-6">
                    <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No#</th>
                                    <th>Employee Name</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No#</th>
                                    <th>Employee Name</th>
                                    <th>Address</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                    </div>
                </div>
                
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

<script>
 $('#btnSubmit').click(function() {
    var input_employee_name = [];
    var input_address = [];

    $('.input_employee_name').each(function(){
        input_employee_name.push($(this).val());
    });

    $('.input_address').each(function(){
        input_address.push($(this).val());
    });

    var inputData = {input_employee_name: input_employee_name, input_address: input_address};

    $.ajax({
        url: base_url + 'Topic03/save',
        type: 'post',
        data: inputData,
        beforeSend: function() {
            $('#btnSubmit').html(
                '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
            );
        },
        success: function(data) {
            if (data.type) {
                if (data.type === "success") {
                    window.location.replace(base_url + 'Topic03/index')
                }

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Submit Successfully',
                    showConfirmButton: false,
                    timer: 5000
                })

            }

            $('#btnSubmit').html('Submit')
        }
    });
});

</script>