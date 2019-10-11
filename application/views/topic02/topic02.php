<body>
    <div class="wrapper">
        <!-- TopNav and SideNav here -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Topic 02
                    <small>PHP CodeIgniter and JQuery AJAX append table row using jquery and insert all table data to database (Working) </small>
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
                    <!-- <form action="javascript:void(0)" method="post" id="insert_form" name="insert_form" > -->
                        <div class="box-body">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No.</label>
                                    <input type="text" class="form-control" id="no" name="no" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Employee Fullname</label>
                                    <input type="text" class="form-control" id="employee_name" name="employee_name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control" id="address" id="address">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Reset</button>
                            <button type="submit" id="btnAddDataToTable" class="btn btn-info">Add Data To Table</button>
                            <button type="submit" id="btnAddTableDataToDatabase" class="btn btn-success pull-right">Add Table Data to Database</button>
                        </div>
                    <!-- </form> -->
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
    $(function(){
        
        // set number for adding row
        function set_number(){
             var table_length = $('#example1 tbody tr').length + 1;
             $('#no').val(table_length);
        }

        set_number();


        // append input data to table
        $('#btnAddDataToTable').click(function(){
            var no = $('#no').val();
            var employee_name = $('#employee_name').val();
            var address = $('#address').val();

            $('#example1 tbody:last').append(
                '<tr>'+
                    '<td>'+no+'</td>'+
                    '<td>'+employee_name+'</td>'+
                    '<td>'+address+'</td>'+
                '</tr>'   
            );

            // clear input fields
            $('#no').val('');
            $('#employee_name').val('');
            $('#address').val('');

            // call this function to set new number
            set_number();
        });

        // add table data to database
        $('#btnAddTableDataToDatabase').click(function(){
            var table_data = [];
            
            // we will use .each to get all the data
            $('#example1 tr').each(function(row,tr){

                if($(tr).find('td:eq(0)').text() == ""){

                }else{
                    var sub = {
                        'no' : $(tr).find('td:eq(0)').text(),
                        'employee_name' : $(tr).find('td:eq(1)').text(),
                        'address' : $(tr).find('td:eq(2)').text(),
                    };
                    
                    table_data.push(sub);
                }
            });
            
            // we use ajax to insert the data to database
            var tableData = { 'table_data' : table_data };
            //console.log(tableData);
                $.ajax({
                    url: base_url + 'Topic02/save',
                    type: 'post',
                    data: tableData,
                    beforeSend: function() {
                        $('#btnAddTableDataToDatabase').html(
                            '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
                        );
                    },
                    success: function(data) {
                        if (data.type) {
                            if (data.type === "success") {
                                window.location.replace(base_url + 'Topic02/index')
                            }

                            Swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Submit Successfully',
                                showConfirmButton: false,
                                timer: 5000
                            })

                        }

                        $('#btnAddTableDataToDatabase').html('Submit')
                    }
                });
            
            
        });


    });





</script>