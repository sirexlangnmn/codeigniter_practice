<body>
    <div class="wrapper">
        <!-- TopNav and SideNav here -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Topic 04
                    <small>Multiple Inline Insert into Mysql using Ajax JQuery in PHP (Working)</small>
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
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="box-footer">
                            <button type="button" class="btn btn-default" id="btnAddTableRow" name="btnAddTableRow" >Add Row</button>
                            <button type="button" class="btn btn-success pull-right" id="btnSave" name="btnSave">Submit</button>
                        </div>
                    </div>
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
    $(document).ready(function(){
        var count = 1;
        $('#btnAddTableRow').click(function(){
            //alert('dadas')
            count = count + 1;
            var html_code;
            html_code = "<tr id='row"+count+"'>";
            html_code += "<td contenteditable='true' class='input_employee_name'></td>";
            html_code += "<td contenteditable='true' class='input_address'></td>";
            html_code += "<td><button type='button' class='btn btn-danger btn-xs' id='btnRemove' name='btnRemove' data-row='row"+count+"'>Remove</button></td>";
            html_code += "</tr>";

            $('#example').append(html_code);
        });

        $(document).on('click', '#btnRemove', function(){
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });

        $('#btnSave').click(function(){
            var input_employee_name = [];
            var input_address = [];

            $('.input_employee_name').each(function(){
                input_employee_name.push($(this).text());
            });

            $('.input_address').each(function(){
                input_address.push($(this).text());
            });


            var inputData = {input_employee_name: input_employee_name, input_address: input_address};

            $.ajax({
                url: base_url + 'Topic04/save',
                type: 'post',
                data: inputData,
                beforeSend: function() {
                    $('#btnSave').html(
                        '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
                    );
                },
                success: function(data) {
                    $("td[contenteditable='true']").text("");
                    for(var i=2; i<=count; i++)
                    {
                        $('tr#'+1+'').remove();
                    }

                    if (data.type) {
                        if (data.type === "success") {
                            window.location.replace(base_url + 'Topic04/index')
                        }

                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'Submit Successfully',
                            showConfirmButton: false,
                            timer: 5000
                        })

                    }

                    $('#btnSave').html('Submit')
                }
            });





        });



  });
</script>