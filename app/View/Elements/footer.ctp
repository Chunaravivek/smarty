</section>
</div>
    <!-- PAGE LEVEL SCRIPTS -->
        <script type="text/javascript">var plugin_path = 'http://localhost/smarty/assets/plugins/';</script>
        <script type="text/javascript" src="<?= LOAD_ADMIN; ?>js/app.js"></script>
        <script type="text/javascript" src="<?= LOAD_PLUGIN; ?>bootstrap/js/bootstrap.min.js"></script>
       
        
    <script type="text/javascript">
        $(document).ready( function () {
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

                    jQuery("#jqgrid").jqGrid('setGridWidth', jQuery("#middle").width() - 32);

                }, 500);

            });

            // ----------------------------------------------------------------------------------------------------

            /**
             @STYLING
             **/
            jQuery(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
            jQuery(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
            jQuery(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
            jQuery(".ui-jqgrid-pager").removeClass("ui-state-default");
            jQuery(".ui-jqgrid").removeClass("ui-widget-content");

            jQuery(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
            jQuery(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
            jQuery(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
            jQuery(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
            jQuery(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
            jQuery(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
            jQuery(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
            jQuery(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
            jQuery(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");

            jQuery(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
            jQuery(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

            jQuery(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
            jQuery(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");

            jQuery(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
            jQuery(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

            jQuery(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
            jQuery(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");
        });
    </script>
    <!-- END: Body-->
    
   
</body>
</html>
