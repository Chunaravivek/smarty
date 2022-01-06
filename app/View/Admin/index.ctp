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
            colNames: ['Action', 'Id', 'Name', 'Email', 'Status' ,'Created Date', 'Modified Date'],
            colModel: [
                {name: 'myac', index: 'myac', width: 15, align: 'center', sortable: false},
                {name: 'id', index: 'id', align: 'center', width: 10, editable: false},
                {name: 'full_name', index: 'full_name', align: 'center', width: 50, editable: false},
                {name: 'email', index: 'email', align: 'center', width: 80, editable: false},
                {name: 'status', index: 'status', width: 20, editable: false, editoptions: {value: "1:2"}, formatter: checkboxFormatter, formatoptions: {disabled: false}, sortable: false},
                {name: 'created_date', index: 'created_date', align: 'center', width: 30, editable: false},
                {name: 'modified_date', index: 'modified_date', align: 'center', width: 40, editable: false},
                
            ],
            width: 760,
            height: 350,
            viewrecords: true,
            rowNum: 30,
            rowList: [10, 20, 30, 50, 100],
            pager: pager_selector,
            altRows: true,
            multiselect: true,
            multiboxonly: true,
            gridComplete: function(){
                var ids = jQuery(grid_selector).jqGrid('getDataIDs');
                for(var i=0;i < ids.length;i++){
                    var cl = ids[i];
                    var be = "<button class='btn btn-xs btn-default btn-quick' title='Edit Row' onclick=\"jQuery('#jqgrid').editRow('"+cl+"');\"><i class='fa fa-pencil'></i></button>";
                    var ca = "<button class='btn btn-xs btn-default btn-quick' title='Cancel' onclick=\"jQuery('"+ grid_selector +"').restoreRow('"+cl+"');\"><i class='fa fa-trash-o'></i></button>";  
                    jQuery(grid_selector).jqGrid('setRowData',ids[i],{myac:be+ca});
                }
                
                var table = this;
                setTimeout(function () {
//                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },
                
            editurl: "Admin/inline",
            caption: "Admin",
            autowidth: true,
            sortable: true,
            loadComplete: function () {

            }
        });
        
        jQuery(grid_selector).jqGrid('navGrid', pager_selector, {
            edit: false,
            editicon: 'fa fa-pencil',
            add: false,
            addicon: 'fa fa-plus',
            del: false,
            delicon: 'fa fa-trash-o',
            search: false,
            searchicon: 'fa fa-search',
            refresh: true,
            refreshicon: 'fa fa-refresh',
            view: false,
        }).navButtonAdd(pager_selector,{
            caption: "",
            buttonicon: "fa fa-plus",
            title : 'Add selected row',
            onClickButton: function () {
                var grid = $("#grid-table");
                console.log(grid);
                var rowid = grid.jqGrid('getGridParam', 'selrow');
                if (rowid != '' && rowid != null && isNaN(rowid) == false) {
                    window.location = 'Admin/add/' + rowid;
                }
            },
            position: "first"
        }).navSeparatorAdd(pager_selector,{
            sepclass : "ui-separator",
        }).navButtonAdd(pager_selector,{
            caption: "",
            buttonicon: "fa fa-pencil",
            title : 'Edit selected row',
            onClickButton: function () {
                var grid = $("#grid-table");
                console.log(grid);
                var rowid = grid.jqGrid('getGridParam', 'selrow');
                if (rowid != '' && rowid != null && isNaN(rowid) == false) {
                    window.location = 'Admin/edit/' + rowid;
                }
            },
            position: "first"
        }).navButtonAdd(pager_selector,{
            caption: "",
            buttonicon: "fa fa-trash-o",
            title : 'Remove selected row',
            onClickButton: function () {
                var grid = $("#grid-table");
                console.log(grid);
                var rowid = grid.jqGrid('getGridParam', 'selrow');
                if (rowid != '' && rowid != null && isNaN(rowid) == false) {
                    window.location = 'Admin/delete/' + rowid;
                }
            },
            position: "last"
        });
        
        jQuery(grid_selector).jqGrid('inlineNav',pager_selector);
        
        // On Resize
        jQuery(window).resize(function () {

            if (window.afterResize) {
                clearTimeout(window.afterResize);
            }

            window.afterResize = setTimeout(function () {

                /**
                 After Resize Code
                 .................
                 **/

                jQuery(grid_selector).jqGrid('setGridWidth', jQuery("#middle").width() - 32);

            }, 500);

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
            if (cellvalue == '1')
            {
                checked = "checked='checked'";
            }
            return "<label class='switch switch-success switch-round' style='margin:0 0 0 -130px'>\
                    <input type='checkbox' " + checked + " class='' value='" + cellvalue + "'>\
                    <span class='switch-label' data-on='YES' data-off='NO'></span>";
        }
        
        jQuery(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
        jQuery(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
        jQuery(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
        jQuery(".ui-jqgrid-pager").removeClass("ui-state-default");
        jQuery(".ui-jqgrid").removeClass("ui-widget-content");
//
        jQuery(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
        jQuery(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");  
        jQuery(".ui-icon.fa.fa-pencil").parent(".btn-primary").removeClass("btn-primary").addClass("btn-blue");
        jQuery(".ui-icon.fa.fa-plus").parent(".btn-primary").removeClass("btn-primary").addClass("btn-purple");
        jQuery(".ui-icon.fa.fa-refresh").parent(".btn-primary").removeClass("btn-primary").addClass("text-white bg-orange");
        jQuery(".ui-icon.fa.fa-trash-o").parent(".btn-primary").removeClass("btn-primary").addClass("btn-red");
        jQuery(".ui-icon.fa.fa-refresh").parent(".btn-primary").removeClass("btn-primary").addClass("btn-green");
//        jQuery(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
//        jQuery(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
//        jQuery(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
//        jQuery(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
//        jQuery(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
//        jQuery(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");
//
        jQuery( ".ui-icon.ui-icon-seek-prev" ).wrap( "<div class='btn btn-sm btn-default'></div>" );
        jQuery(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

        jQuery( ".ui-icon.ui-icon-seek-first" ).wrap( "<div class='btn btn-sm btn-default'></div>" );
        jQuery(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");		  	

        jQuery( ".ui-icon.ui-icon-seek-next" ).wrap( "<div class='btn btn-sm btn-default'></div>" );
        jQuery(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

        jQuery( ".ui-icon.ui-icon-seek-end" ).wrap( "<div class='btn btn-sm btn-default'></div>" );
        jQuery(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");
        
        

        function enableTooltips(table) {
            $('.navtable .ui-pg-button').tooltip({container: 'body'});
            $(table).find('.ui-pg-div').tooltip({container: 'body'});
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


