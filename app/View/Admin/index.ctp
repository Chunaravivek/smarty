<?php
    echo $this->Element('all_form_css'); 
    
    
?>

<?php echo  $this->Element('breadcrumb'); ?>

<style>
    p.help-block > ul {
        padding: 0 !important;
    }
    
    .modal {
        z-index: 9999 !important;
    }
    
    .project-status .btn-group.btn-group-sm {
        background-color: #0000002e;
    }
    
</style>
<div id="content" class="padding-20">
    <div id="panel-1" class="panel panel-default">
        <?php echo $this->Session->flash(); ?>
        <div class="panel-heading">
            <span class="title elipsis">
                <!--<strong>Admin Manage</strong>--> 
            </span>
            <!-- right options -->
            <ul class="options pull-right list-inline">
                <li>
                    <a href="#" class="opt panel_colapse" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Colapse">
                    </a>
                </li>
                <li>
                    <a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen">
                        <i class="fa fa-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Close">
                        <i class="fa fa-times"></i>
                    </a>
                </li>
            </ul>
            <!-- /right options -->
        </div>
        <!-- panel content -->
        <div class="panel-body">
            <table id="grid-table"></table>
            <div id="grid-pager"></div>
        </div>

        <div class="panel-footer">

        </div>
    </div>
</div>

<div class="modal animated bounceIn" id="modal-default" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php echo $this->Form->create('Admin', array('url' => array('controller' => 'Admin', 'action' => 'add'), 'class' => 'form form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-2 label-control" for="full_name"> Full Name : </label>
                            <div class="col-md-9 mx-auto">
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('full_name', array('error',
                                        'label' => false,
                                        'div' => false,
                                        'id' => 'full_name',
                                        'data-validation-required-message' => "This field is required",
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Full Name',
                                    ));
                                    ?>

                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-control"  for="email"> Email : </label>
                            <div class="col-md-9 mx-auto">
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('email', array('error',
                                        'type' => 'email',
                                        'label' => false,
                                        'div' => false,
                                        'id' => 'email',
                                        'data-validation-required-message' => "This field is required",
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Email',
                                    ));
                                    ?>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-control"  for="password"> Password : </label>
                            <div class="col-md-9 mx-auto">
                                <div class="controls">
                                    <?php
                                    echo $this->Form->input('password', array('error',
                                        'label' => false,
                                        'div' => false,
                                        'id' => 'password',
                                        'type' => 'password',
                                        'data-validation-required-message' => "This field is required",
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Password',
                                    ));
                                    ?>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" id="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
                    <button type="reset" class="btn btn-danger">Reset <i class="la la-refresh position-right"></i></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal data Delete -->
<div id="conf-modal-dialog" title="Confirm">
    <!--Are you sure want to delete this record?-->
</div>

<!-- Modal data details edit -->
<div class="modal animated bounceIn bd-example-modal-lg" id="edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="Edit-Content">

            </div>
        </div>
    </div>
</div>

<?php echo $this->Element('all_form_js'); ?>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready( function () {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        var url = "<?php echo BASE_URL;?>Admin/records.json";
        
        $(grid_selector).jqGrid({
            url: url,
            datatype: "json",
            colNames: [' ', 'Id', 'Name', 'Email', 'Status' ,'Created Date', 'Modified Date'],
            colModel: [
                {name: 'myac', index: '', width: 70, align: 'center', fixed: true, sortable: false, resize: false, formatter: 'actions',
                    formatoptions: {
                        keys: true,
                        delOptions: {recreateForm: true, beforeShowForm: beforeDeleteCallback},
                    }
                },
                {name: 'id', index: 'id', align: 'center', width: 80, editable: false},
                {name: 'full_name', index: 'full_name', align: 'center', width: 80, editable: false},
                {name: 'email', index: 'email', align: 'center', width: 80, editable: false},
                {name: 'status', index: 'status', width: 50, editable: false, editoptions: {value: "0:1"}, formatter: checkboxFormatter, formatoptions: {disabled: false}, sortable: false},
                {name: 'created_date', index: 'created_date', align: 'center', width: 80, editable: false},
                {name: 'modified_date', index: 'modified_date', align: 'center', width: 80, editable: false},
                
            ],
            width: '100%',
            height: 350,
            viewrecords: true,
            rowNum: 30,
            rowList: [10, 20, 30, 50, 100],
            pager: pager_selector,
            altRows: true,
            multiselect: true,
            multiboxonly: true,
//            editurl: "AdPartner/inline",
            caption: "Admin",
            autowidth: true,
            sortable: true,
            loadComplete: function () {

            }
        });
        
        function beforeDeleteCallback(e) {
            var form = $(e[0]);
            if (form.data('styled'))
                return false;

            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);

            form.data('styled', true);
        }
        
        function checkboxFormatter(cellvalue, options, rowObject, rowid) {
            var checked = '';
            if (cellvalue == '0')
            {
                checked = "checked='checked'";
            }
            return "<label style='margin:0 0 0 -130px'>\
                    <input type='checkbox' " + checked + " class='ace ace-switch ace-switch-3' value='" + cellvalue + "'><span class='lbl'></span></label>";
        }
    });
    
    $(function () { 
        $('#AdminAddForm').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                "data[Admin][full_name]": {
                    required: true,
                },
                "data[Admin][email]": {
                    required: true,
                },
                "data[Admin][password]": {
                    required: true,
                },
            },
            submitHandler: function(form) {
                $this = $('#add_submit');
                $this.prop('disabled', true);
                $this.css('cursor', 'no-drop');
                $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
                form.submit();
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.col-md-9.mx-auto').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
                $(element).siblings('.select2').removeClass('is-valid');
                
                $(element).siblings('.select2').addClass('select-box-section is-invalid');
                $(element).parents('.form-group').find('.label-control').addClass('text-danger');

            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');

                $(element).siblings('.select2').removeClass('select-box-section is-invalid');
                $(element).parents('.form-group').find('.label-control').removeClass('text-danger');

                $(element).siblings('.select2').addClass('select-box-section is-valid');
                $(element).parents('.form-group').find('.label-control').addClass('text-success');
            }
        });
    });

    
    $( "#conf-modal-dialog" ).hide();
    function deleteModal(id) {
        $( "#conf-modal-dialog" ).show();
        $( "#conf-modal-dialog" ).dialog({
            autoOpen: true,
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons :  { 
                "MyButton" : {
                    text: "OK",
                    id: "confirmOk",
                    click: function(){
                        $("#confirmOk").attr('data-user', id);
                        $this = $('#confirmOk');
                        $this.prop('disabled', true);
                        $this.css('cursor', 'no-drop');
                        var this_delete = $("#confirmCancel");
                        this_delete.remove();
                        $this.html('<span class="spinner-border spinner-border-sm" disabled role="status" aria-hidden="true" style="cursor: no-drop;"></span>Loading...');
                        window.location.href= "<?php echo $this->webroot; ?>Admin/delete/"+id;
                    }   
                }, 
                "MyButton1" : {
                    text: "Cancel",
                    id: "confirmCancel",
                    click: function(){
                        $(this).dialog('close');
                    }   
                } 
            }
        });
    }
    
    $(function() {
    });
    
    function EditModal(id) {
        $('#edit').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#edit").modal('show');	
        $("#edit").attr('data-user', id);

        $.ajax({
            type:"POST",
            dataType: '',
            data:{id:id}, 
            url:"<?php echo BASE_URL;?>Admin/edit",
            cache:false,
            success : function(data) {
                $('.Edit-Content').html(data);
                return data;
            },
            error : function() {
               alert('error');

            }
        });
    }
</script>


