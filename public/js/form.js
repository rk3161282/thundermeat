/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getval(sel)
{
    //alert($("#e1").val());
     var formData = new FormData();
     formData.append('request_type',$("#e1").val());
    $.ajax({
        url: searchurl,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,

        success: function (obj)
        {


            if (obj.err == 0)
            {

            }

            else
            {

            }

        }

    });
}


function saveData()
{

    if($("#e1").val() != ""){
        var category = $("#e1").val();
    }
    var formData = new FormData($('#myForm')[0]);
      formData.append('category',category);
    $.ajax({
        url: url,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: function () {

            App.blockUI({
                target: '#myForm',
                animate: true
            });
        },
        success: function (obj)
        {
            App.unblockUI("#myForm");

            if (obj.err == 0)
            {
                $("#error1").html("");
                $("#success1").html(obj.msg);
                $('#err1').css({'display': 'none'});
                $('#succ1').css({'display': 'block'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);

                setInterval(function () {
                    window.location.href = redirect_url;
                }, 3000);
            }

            else
            {
                $("#error1").html(obj.msg);
                $("#success1").html("");
                $('#err1').css({'display': 'block'});
                $('#succ1').css({'display': 'none'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);
                setTimeout(function () {
                    $('.custom_err').fadeOut()
                }, 5000);
            }

        }

    });
}
function saveNewData1()
{
    var formData = new FormData($('#myForm')[0]);

     if($("#e2").val() != ""){
        formData.append("module_rights",$("#e2").val());
    }
    $.ajax({
        url: url,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
          beforeSend: function () {
              $("#wait").css("display", "block");
            // App.blockUI({
            //     target: '#myForm',
            //     animate: true
            // });
        },
        success: function (obj)
        {
            $("#wait").css("display", "none");
        //   App.unblockUI("#myForm");

            if (obj.err == 0)
            {
              $("#error1").html("");
                $("#success1").html(obj.msg);
                $('#err1').css({'display': 'none'});
                $('#succ1').css({'display': 'block'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);

                setInterval(function () {
                    window.location.href = redirect_url;
                }, 3000);
            }

            else
            {
                $("#error1").html(obj.msg);
                $("#success1").html("");
                $('#err1').css({'display': 'block'});
                $('#succ1').css({'display': 'none'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);
                setTimeout(function () {
                    $('.custom_err').fadeOut()
                }, 5000);
            }

        }

    });
}
function saveEmaildata()
{
     var content;
    if(tinymce.get("texteditor")){
           content = tinymce.get("texteditor").getContent();
    }
  
    console.log(content);
    console.log($("#e1").val());
   
    var formData = new FormData($('#myForm')[0]);
    formData.append("editor",content);
     if($("#e1").val() != ""){
        formData.append("category",$("#e1").val());
    }
    
     if($("#e2").val() != ""){
        formData.append("module_rights",$("#e2").val());
    }
    $.ajax({
        url: url,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
          beforeSend: function () {

           
        },
        success: function (obj)
        {
          
            if (obj.err == 0)
            {
             // alert(obj.msg);
                window.location.href = redirect_url;
                setInterval(function () {
                   window.location.href = base_url+'Admin';
              }, 1000);
            }

            else
            {
                $("#error1").html(obj.msg);
                $("#success1").html("");
                $('#err1').css({'display': 'block'});
                $('#succ1').css({'display': 'none'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);
                setTimeout(function () {
                    $('.custom_err').fadeOut()
                }, 5000);
            }

        }

    });
}
function saveUserFormData()
{
    var formData = new FormData($('#myForm')[0]);

     if($("#country").val() != ""){
        formData.append("country",$("#country").val());
     }
     if($("#state").val() != ""){
        formData.append("state",$("#state").val());
     }
     if($("#city").val() != ""){
        formData.append("city",$("#city").val());
     }
     if($("#role").val() != ""){
        formData.append("role",$("#role").val());
     }

    $.ajax({
        url: url,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
          beforeSend: function () {
              $("#wait").css("display", "block");
            // App.blockUI({
            //     target: '#myForm',
            //     animate: true
            // });
        },
        success: function (obj)
        {
            $("#wait").css("display", "none");
        //   App.unblockUI("#myForm");

            if (obj.err == 0)
            {
              $("#error1").html("");
                $("#success1").html(obj.msg);
                $('#err1').css({'display': 'none'});
                $('#succ1').css({'display': 'block'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);

                setInterval(function () {
                    window.location.href = redirect_url;
                }, 3000);
            }

            else
            {
                $("#error1").html(obj.msg);
                $("#success1").html("");
                $('#err1').css({'display': 'block'});
                $('#succ1').css({'display': 'none'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);
                setTimeout(function () {
                    $('.custom_err').fadeOut()
                }, 5000);
            }

        }

    });
}
function saveNewData()
{

    //  for (var instanceName in CKEDITOR.instances) {
    //      CKEDITOR.instances[instanceName].updateElement();
    //  }

    var formData = new FormData($('#myForm')[0]);

    $.ajax({
        url: url,
        cache: false,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
          beforeSend: function () {
                 $("#wait").css("display", "block");
            // App.blockUI({
            //     target: '#myForm',
            //     animate: true
            // });
        },
        success: function (obj)
        {
            $("#wait").css("display", "none");
        //   App.unblockUI("#myForm");

            if (obj.err == 0)
            {
              $("#error1").html("");
                $("#success1").html(obj.msg);
                $('#err1').css({'display': 'none'});
                $('#succ1').css({'display': 'block'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);

                setInterval(function () {
                    window.location.href = redirect_url;
                }, 3000);
            }

            else
            {
                $("#error1").html(obj.msg);
                $("#success1").html("");
                $('#err1').css({'display': 'block'});
                $('#succ1').css({'display': 'none'});
                $('html, body').animate({
                    scrollTop: $("#scrl1").first().offset().top - 250
                }, 1000);
                setTimeout(function () {
                    $('.custom_err').fadeOut()
                }, 5000);
            }

        }

    });
}

function getChild(val)
{
    var id = val.value;
    $.ajax({
        url: base_url + "Admin/getSubCat",
        type: "POST",
        dataType: "json",
        data: {"id": id},
        beforeSend: function () {

            App.blockUI({
                target: '#sub_cat_div',
                animate: true
            });
            $("#sub_cat_div").html("");
            $("#sub_sub_cat_div").html("");
        },
        success: function (obj)
        {
            if (obj != false) {
                App.unblockUI("#sub_cat_div");
               $("#sub_cat_div").append('<label>Sub Category <span class="required" aria-required="true"> * </span></label> <select class="form-control cat" onchange="getSubChild(this)" id="subcat" name="subcat" data-placeholder="">  <option value="">Select sub category</option></select>');
               // $("#sub_cat_div").append('<label>Sub Category <span class="required" aria-required="true"> * </span></label> <select class="form-control cat" id="subcat" name="subcat" data-placeholder="">  <option value="">Select sub category</option></select>');
                $.each(obj, function (key, value) {

                    $('#subcat')
                            .append($("<option></option>")
                                    .attr("value", value.cat_id)
                                    .text(value.cat_title));
                });
            }
        }
    });

}
function getSubChild(val)
{
    var id = val.value;
    $.ajax({
        url: base_url + "Admin/getSubCat",
        type: "POST",
        dataType: "json",
        data: {"id": id},
        beforeSend: function () {

            App.blockUI({
                target: '#sub_sub_cat_div',
                animate: true
            });
            $("#sub_sub_cat_div").html("");
        },
        success: function (obj)
        {
            if (obj != false) {
                App.unblockUI("#sub_sub_cat_div");
                $("#sub_sub_cat_div").append('<label>Sub Category <span class="required" aria-required="true"> * </span></label> <select class="form-control cat" id="subsubcat" name="subsubcat" data-placeholder="">  <option value="">Select sub category</option></select>');
                $.each(obj, function (key, value) {

                    $('#subsubcat')
                            .append($("<option></option>")
                                    .attr("value", value.cat_id)
                                    .text(value.cat_title));
                });
            }
        }
    });

}

var id = 1;

function addFight() {
    var rows = document.getElementById("tblData").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;

    if (rows >= 6) {
        alert("sorry only 6 rows allowed");
    }
    else {
        id++;
        $("#tblData tbody").append(
                "<tr id='" + id + "'>" +
                '<td style="width:10% "><div class="form-group" style="margin-bottom: 0px;">' +
                '<div class="input-icon"><div class="fileinput fileinput-new" id="file_input_exist" data-provides="fileinput">' +
                '<div class="input-group input-large"><div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">' +
                '<i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename" id="file_name">' +
                '</span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">' +
                'Upload Product Image </span><span class="fileinput-exists">Change </span>' +
                '<input type="file" name="product_img[]"></span><a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remove </a></div></div></div></div></td>' +
                '<td><div class="form-group btnDelete"><a class="btn btn-small red " href="javascript:;" ><i class="fa fa-minus"></i> Remove</div></td>' +
                "</tr>");
        $(".btnDelete").bind("click", DeleteFight);



    }
}


function DeleteFight() {
    id--;
    var par = $(this).parent().parent(); //tr
    par.remove();
}

function disFields(e)
{
    var val = e.value;
//   alert(val);
    $("#tblData tbody").html("");
    if (val == 2)
    {
        $("#cost").attr("disabled", "disabled");
        $("#qty").attr("disabled", "disabled");
        $("#tblData tbody").append(
                "<tr id='1'>" +
                '<td style="width:10% "><div class="form-group" style="margin-bottom: 0px;">' +
                '<div class="input-icon"><div class="fileinput fileinput-new" id="file_input_exist" data-provides="fileinput">' +
                '<div class="input-group input-large"><div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">' +
                '<i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename" id="file_name">' +
                '</span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">' +
                'Upload Service Image </span><span class="fileinput-exists">Change </span>' +
                '<input type="file" name="service_img"></span><a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remove </a></div></div></div></div></td>' +
                "</tr>");
    }
    else
    {
        $("#cost").removeAttr("disabled", "disabled");
        $("#qty").removeAttr("disabled", "disabled");
        $("#tblData tbody").append(
                "<tr id='1'>" +
                '<td style="width:10% "><div class="form-group" style="margin-bottom: 0px;">' +
                '<div class="input-icon"><div class="fileinput fileinput-new" id="file_input_exist" data-provides="fileinput">' +
                '<div class="input-group input-large"><div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">' +
                '<i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename" id="file_name">' +
                '</span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">' +
                'Upload Product Image </span><span class="fileinput-exists">Change </span>' +
                '<input type="file" name="product_img[]"></span><a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remove </a></div></div></div></div></td>' +
                '<td><a class="btn btn-small green" href="javascript:;" onclick="addFight()"><i class="fa fa-plus"></i> Add New</a></td>' +
                "</tr>");
    }
}
// $('<div class="form - group"><label>Sub category<span class = "required" aria - required = "true" > * </span></label>'+
//          +'<select class = "form-control cat" onchange = "getChild(this)" id = "cat" name = "type" data - placeholder = "Select Parent" >< /select></div>').insertAfter($("#cat").parent());
