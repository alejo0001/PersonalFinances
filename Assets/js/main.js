

$(document).ready(function () {


    //Accounts:
  
    if ($("#saveAccountState").val() == "1")
    {
        alertify.success("Cuenta creada con éxito");
        $("#saveAccountState").val("");
    } else if ($("#saveAccountState").val() == "2") {
        alertify.error("Error al guardar los datos");
        $("#saveAccountState").val("");
    }

    if ($("#editAccountState").val() == "1") {
        alertify.success("Cuenta editada con éxito");
        $("#editAccountState").val("");
    } else if ($("#editAccountState").val() == "2") {
        alertify.error("Error al guardar los datos");
        $("#editAccountState").val("");
    }

    if ($("#deleteAccountState").val() == "1") {
        alertify.success("Cuenta eliminada con éxito");
        $("#deleteAccountState").val("");
    } else if ($("#deleteAccountState").val() == "2") {
        alertify.error("Error al eliminar los datos");
        $("#deleteAccountState").val("");
    }

    $('.account_item').each(function () {
        $(this).click(function () {
            $(this).find('.detailsForm').submit();
           
        });
        
    });


    //Categories:

    if ($("#saveCategoryState").val() == "1") {
        alertify.success("Categoría creada con éxito");
        $("#saveCategoryState").val("");
    } else if ($("#saveCategoryState").val() == "2") {
        alertify.error("Error al guardar los datos");
        $("#saveCategoryState").val("");
    }

    if ($("#editCategoryState").val() == "1") {
        alertify.success("Categoría editada con éxito");
        $("#editCategoryState").val("");
    } else if ($("#editCategoryState").val() == "2") {
        alertify.error("Error al guardar los datos");
        $("#editCategoryState").val("");
    }

    if ($("#deleteCategoryState").val() == "1") {
        alertify.success("Categoría eliminada con éxito");
        $("#deleteCategoryState").val("");
    } else if ($("#deleteCategoryState").val() == "2") {
        alertify.error("Error al eliminar los datos");
        $("#deleteCategoryState").val("");
    }
       

    $('#details_table').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious":"Anterior",
            },
            "sProcessing":"Procesando...",
        }
    });
    
    

});



