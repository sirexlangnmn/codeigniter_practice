
<script>
function selectAll(){
    // alert("adadas");
    var checkboxes = document.getElementsByName('employee_id[]');
    var button = document.getElementById('toggle');

    if(button.value == 'Select'){
        for (var i in checkboxes){
            checkboxes[i].checked = 'FALSE';
        }
        button.value = 'Deselect'
    }
    else{
        for (var i in checkboxes){
            checkboxes[i].checked = '';
        }
        button.value = 'Select'
    }
}
</script>
<body>
    <div class="wrapper">
        <!-- TopNav and SideNav here -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Topic 01
                    <small>How to Insert Multiple Records into Database using PHP Codeigniter (Working)</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Topic 01</li>
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
                    <form action="javascript:void(0)" method="post" id="message_form" name="message_form" >
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Messages</label>
                                    <input type="text" class="form-control" id="message" name="message" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <input type="button" class="btn btn-default" id="toggle" value="Select" onClick="selectAll()" />
                                <?php if(count($employees)): ?>
                                    <?php foreach($employees as $row): ?>
                                        <div class="form-group">
                                            <input type="checkbox" class="flat-red" id="employee_id[]" name="employee_id[]" value="<?php echo $row['id']; ?>" >
                                            <label><?php echo $row['employee_name']; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>    
                                    <p>No record found</p>
                                <?php endif; ?>
                                <!-- <div class="form-group">
                                    <label>
                                    <input type="checkbox" name="r3" class="flat-red">
                                    meow
                                    </label>
                                </div> -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Reset</button>
                            <button type="submit" value="Submit" name="submit" id="btnSubmit" class="btn btn-info pull-right">Submit</button>
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
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
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
    $('#message_form').submit(function() {
    $.ajax({
        url: base_url + 'Topic01/message',
        type: 'post',
        data: $('#message_form').serialize(),
        beforeSend: function() {
            $('#btnSubmit').html(
                '<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span> Please wait...'
            );
        },
        success: function(data) {
            if (data.type) {
                if (data.type === "success") {
                    window.location.replace(base_url + 'Topic01/index')
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