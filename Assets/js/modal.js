$(document).ready(function () {
    $('#add_account').click(function () {
        $('#nombre_c').val("");
        $("#ammountField").show();
        
      
    });

    $('#add_category').click(function () {
        $('#newSubField').hide();
        $('#SubcategoryList').html('');
        $('#nombre_c').val("");
        $('.modal-title').html('Nueva Categoría');

    });


    $('.close-modal').click(function () {
        $('#modal').css("display", "none");
        $('#modal').removeClass("modal");
        $('#nombre_c').val("");

     
    });

    $(".edit_account").each(function (index) {
        $(this).click(function () {

            $('#account_form').attr("action", "http://localhost/PersonalFinances/account/edit");

            var id = $(this).attr("name");
            $('#id_a').val(id);

            $.ajax({
                url: 'http://localhost/PersonalFinances/Assets/ajax/fillForm_edit_account.php',
                type: 'post',
                data: { id: id },
                success: function (response) {
                    $("#nombre_c").val(response);
                    $("#ammountField").hide();
                    
                }

            });

        });


    });



    $(".edit_category").each(function (index) {
        $(this).click(function () {
            $('#newSubField').hide();
            $('#SubcategoryList').html('');
            $('.modal-title').html('Editar Categoría');
            $('#categoryForm').attr("action", "http://localhost/PersonalFinances/category/edit");

            var id = $(this).attr("name");
            $('#id').val(id);

            $.ajax({
                url: 'http://localhost/PersonalFinances/Assets/ajax/fillForm_edit_category.php',
                type: 'post',
                data: { id: id },
                success: function (response) {

                    var arr_response = JSON.parse(response);

                    //$("#nombre_c").val(response);
                    $('#nombre_c').val(arr_response[0].cat_name);
                    for (var i = 0; i < arr_response.length; i++)
                    {
                        if (arr_response[i].sub_name != null)
                        {
                            $('#SubcategoryList').append('<li id="' + arr_response[i].sub_id + '">' + arr_response[i].sub_name + '<button class="editSub btn btn-secondary btn-sm float-right">Editar</button><button class="deleteSub btn btn-warning btn-sm float-right">Eliminar</button></li><br />');
                        }
                    }
                    console.log(response);
                  
                }

            });

        });


    });

    $('#newSub').click(function () {
        $('#newSubField').fadeIn('slow');

    }); 

    $('#createSub').click(function () {
        var newSub = $(this).find('#n_newSub');
        $.ajax({
            url: 'http://localhost/PersonalFinances/Assets/ajax/saveSubcategory.php',
            type: 'post',
            data: { Sub_name: newSub },
            success: function (response) {
                $('#SubcategoryList').append(response);
                console.log(response);
                alert(response);
            },error: function () {
                alert('mierda');
            }
        });
    });

  
});

