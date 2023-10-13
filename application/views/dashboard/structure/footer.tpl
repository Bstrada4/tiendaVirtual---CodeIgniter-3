{strip}
        <!-- jQuery  -->
        <script src="{$baseUrl}public/assets/js/jquery.min.js"></script>
        <script src="{$baseUrl}public/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{$baseUrl}public/assets/js/metisMenu.min.js"></script>
        <script src="{$baseUrl}public/assets/js/jquery.slimscroll.js"></script>
        <script src="{$baseUrl}public/assets/js/waves.min.js"></script>

        {if isset($jqueryDataTable) && isset($clasesDataTable)}
        <!-- Required datatable js -->
        <script src="{$baseUrl}public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{$baseUrl}public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
            <script>
                $(document).ready(function(){
                    var jqueryDataTable = {$jqueryDataTable};
                    var clasesDataTable = '{$clasesDataTable}';
                    $(clasesDataTable).DataTable(jqueryDataTable);
                });
            </script>
        {/if}
        <!-- Plugins js -->
        <script src="{$baseUrl}public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{$baseUrl}public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="{$baseUrl}public/plugins/select2/js/select2.min.js"></script>
        <script src="{$baseUrl}public/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="{$baseUrl}public/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="{$baseUrl}public/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Plugins Init js -->
        <script src="{$baseUrl}public/assets/pages/form-advanced.js"></script>

        <script src="{$baseUrl}public/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="{$baseUrl}public/plugins/alertifyjs/alertify.js"></script>

        <!-- App js -->
        <script src="{$baseUrl}public/assets/js/app.js"></script>
        <!-- Proceso js -->
        <script src="{$baseUrl}public/dashboard/js/proceso.js"></script>
</script>
</body>
{/strip}