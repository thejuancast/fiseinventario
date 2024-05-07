
$(document).ready(function() {

    // VARIABLE QUE ALMACENARA EL PARAMETRO DE COMPANIA (c)
    var com_id = getUrlParameter('c');

    // USO DEL SELECT 2 PARA QUE SE PUEDA BUSCAR JUSTO CON EL COMBO BOX
    $('#emp_id').select2();
    $('#suc_id').select2();

    $.post("controller/empresa.php?op=combo",{com_id:com_id},function(data) {
        $("#emp_id").html(data);
    });

    // VALIDACION DE ACUERDO A SU EMPRESA LANZARA SUS SUCURSALES CORRESPONDIENTES
    $("#emp_id").change(function(){
        $("#emp_id").each(function(){
            emp_id = $(this).val();

            $.post("controller/sucursal.php?op=combo",{emp_id:emp_id},function(data) {
                $("#suc_id").html(data);
            });
        });

    });

});

/* TODO: Obtener parametro de URL */
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};