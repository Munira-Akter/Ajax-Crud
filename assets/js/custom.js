(function($) {

    $(document).ready(function() {


        // img quick load in registration form

        $(document).on('change', 'input#photofor', function(e) {
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
            $('img#imgshow').attr('src', image_url);
            $('img#photo_icon').hide();
            $('label#photo_label').hide();
            $('a#remove_photo').show();
        });
        $(document).on('change', 'input#photofor-up', function(e) {
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
            $('img#imgshow-up').attr('src', image_url);
            $('img#photo_icon-up').hide();
            $('label#photo_label-up').hide();
            $('a#remove_photo-up').show();
        });

        //  remove photo 
        $(document).on('click', 'a#remove_photo', function(e) {
                e.preventDefault();
                $('img#imgshow').attr('src', '');
                $('img#photo_icon').show();
                $('label#photo_label').show();
                $('a#remove_photo').hide();
            })
            //  remove photo 
        $(document).on('click', 'a#remove_photo-up', function(e) {
            e.preventDefault();
            $('img#imgshow-up').attr('src', '');
            $('img#photo_icon-up').show();
            $('label#photo_label-up').show();
            $('a#remove_photo-up').hide();
        })






        // data insert

        $(document).on('submit', 'form#Staffform', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'Ajax_template/StaffAdd.php',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(output) {
                    $('p').html(output);
                    let ss = setInterval(function() {
                        $('p').html('');
                        clearInterval(ss);
                    }, 5000);
                    $('form#Staffform')[0].reset();
                    $('img#imgshow').attr('src', '');
                    $('img#photo_icon').show();
                    $('label#photo_label').show();
                    $('a#remove_photo').hide();
                    allstaff();
                }

            });

        });






        // Data Show on Table row

        allstaff();

        function allstaff() {
            $.ajax({
                url: 'Ajax_template/StaffAll.php',
                success: function(output) {
                    $('tbody#alldata').html(output);
                }
            });
        }


        // delete data
        $(document).on('click', 'a#delete_id', function(event) {
            event.preventDefault();
            let del_id = $(this).attr('delete_id');
            let conn = confirm('Are you Sure you want to delete this' + del_id + 'id');
            if (conn == false) {
                return false;
            } else {
                $.ajax({
                    url: 'Ajax_template/StaffDelete.php',
                    method: "POST",
                    data: { del_id: del_id },
                    success: function(output) {
                        allstaff();
                        $('.msg').html(output);
                        let ss = setInterval(function() {
                            $('.msg').html('');
                            clearInterval(ss);
                        }, 5000);
                    }

                })
            }
        });

        // view single data

        $(document).on('click', 'a#view_id', function(e) {
            e.preventDefault();

            let view_id = $(this).attr('view_id');
            $.ajax({
                url: 'Ajax_template/StaffSingle.php',
                method: "POST",
                data: { view_id: view_id },
                success: function(output) {
                    let singledata = JSON.parse(output);
                    $('#singledata tr td#naam').html(singledata.name);
                    $('#singledata tr td#mail').html(singledata.email);
                    $('#singledata tr td#phone').html(singledata.cell);
                    $('#singledata tr td img').attr('src', 'photos/Staffs/' + singledata.photo);
                    $('#viewSingle').modal('show');

                }

            });
        });


        // active id

        $(document).on('click', 'a#active_id', function(event) {
            event.preventDefault();
            let active_id = $(this).attr('active_id');
            let conn = confirm('Are you Sure you want to inactive this' + active_id + 'id');
            if (conn == false) {
                return false;
            } else {
                $.ajax({
                    url: 'Ajax_template/StaffEdit.php',
                    method: "POST",
                    data: { active_id: active_id },
                    success: function(output) {
                        $(this).hide();
                        $('a#active_id').html(output);

                    }

                });
            }
        });

        // update staff data

        $(document).on('click', 'a#staff_update_modal', function(e) {
            e.preventDefault();
            $('#modal_update').modal('show');
            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url: 'Ajax_template/StaffEdit.php',
                method: "POST",
                data: { edit_id: edit_id },
                success: function(output) {
                    let edit_data = JSON.parse(output);
                    $('#modal_update input[name="name"]').val(edit_data.name);
                    $('#modal_update input[name="id"]').val(edit_data.id);
                    $('#modal_update input[name="email"]').val(edit_data.email);
                    $('#modal_update input[name="cell"]').val(edit_data.cell);
                    $('#modal_update input[name="old_profile"]').val(edit_data.photo);
                    $('#modal_update img#imgshow').attr('src', 'photos/Staffs/' + edit_data.photo);
                }
            });
        });


        // staff update
        $(document).on('submit', 'form#Staffform_update', function(e) {
            e.preventDefault();

            $.ajax({
                url: 'Ajax_template/StaffUpdate.php',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(output) {
                    $('p.msg').html(output);
                    let ss = setInterval(function() {
                        $('p.msg').html('');
                        clearInterval(ss);
                    }, 5000);
                    allstaff();
                    $('#modal_update').modal('hide');
                }
            });
        });


        // email check by ajax

        $(document).on('keyup', '#email_check', function(e) {
            e.preventDefault();
            let email = $(this).val();


            $.ajax({
                url: 'Ajax_template/Staffemail_check.php',
                method: "POST",
                data: {email : email},
                success: function(output) {
                    if(output == 'not' ){
                        $('#value_check').html('Eamail already exits!');
                        $('#add_vlue').attr('disabled' , '');
                    }else if (output == 'ok' ) {
                         $('#add_vlue').removeAttr('disabled');
                         $('#value_check').html('');
                    }
                   
                }
            });
        });
    // email check by ajax

        $(document).on('keyup', '#cell_check', function(e) {
            e.preventDefault();
            let cell = $(this).val();


            $.ajax({
                url: 'Ajax_template/Staffcell_check.php',
                method: "POST",
                data: {cell : cell},
                success: function(output) {
                    if(output == 'not' ){
                        $('#value_check_cell').html('cell already exits!');
                        $('#add_vlue').attr('disabled' , '');
                    }else if (output == 'ok' ) {
                         $('#add_vlue').removeAttr('disabled');
                         $('#value_check_cell').html('');
                    }
                   
                }
            });
        });
// email check by ajax

        $(document).on('keyup', 'input#search', function(e) {
            e.preventDefault();

            let serach = $(this).val();


            $.ajax({
                url: 'Ajax_template/Staffsearch.php',
                method: "POST",
                data: {serach : serach},
                success: function(output) {
                    $('#serch_result ul').show();
                   $('#serch_result').html(output);
                }
            });
        });







    });


})(jQuery);