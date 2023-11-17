$(document).ready(function () {
    // $("#form-input").hide();

     var table = $("#tblPermissions").DataTable({
         processing: true,
         serverSide: true,
         responsive: true,
         ajax: {
             url: "/adminpanel/permissions",
             type: "GET",
         },
         columns: [
            { data: "name", name: "name" },
            { data: "level", name: "level" },
            { data: "module", name: "module" },
             { data: "action", name: "action" },
         ],
         columnDefs: [{ className: "text-center", targets: 3 }],

         order: [[0, "ASC"]],
     });


    new $.fn.dataTable.FixedHeader(table);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
       $("#frmPermissions").on("submit", function (e) {
           e.preventDefault();

           $.ajax({
               url: $(this).attr("action"),
               method: $(this).attr("method"),
               data: new FormData(this),
               processData: false,
               dataType: "json",
               contentType: false,
               beforeSend: function () {
                   $(document).find("span.error-text").text("");
               },
               success: function (data) {
                   if (data.status == 0) {
                       $.each(data.error, function (prefix, val) {
                           $("span." + prefix + "-error").text(val[0]);
                       });
                   } else {
                       //    $("#funding_rules")[0].reset();
                       toastr["success"]("Permissions berhasil ditambahkan");
                       clearData();

                       var oTable = $("#tblPermissions").dataTable();
                       oTable.fnDraw(true);
                   }
               },
           });
       });
    });

    clearData = function () {
        $("#form-input").hide();
        $("span.txtPermissions-error").text("");
        $("span.txtModule-error").text("");
        $("span.txtName-error").text("");
        $("#btnTambah").show();
        $("#select2-txtPermissions-container").text("Pilih Salah Satu");
        $("#select2-txtModule-container").text("Pilih Salah Satu");
        $("#txtPermissions").val("");
        $("#txtModule").val("");
        $("#xtName").val("");

    };
    addData = function () {
        clearData()
        $("#form-input").show();
        $("#btnTambah").hide();
        $("#save").show();
        $("#update").hide();
    };

    editData = function (id) {
        $("#form-input").show();
        $("#save").hide();
        $("#update").show();
        $("#btnTambah").hide();
        $("span.txtPermissions-error").text("");
        $("span.txtModule-error").text("");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/permissions/" + id + "/edit",
            success: function (response) {
                $("#select2-txtPermissions-container").text(response.name);
                $("#select2-txtModule-container").text(response.group_name);
                $("#txtUUID").val(response.id);
                $("#id_permissions").val(response.id_permissions);
                $("#txtPermissions").val(response.name);
                $("#txtModule").val(response.group_name);
            },
        });

    };
    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let id_permissions = $("#id_permissions").val();
        let txtPermissions = $("#select2-txtPermissions-container").text();
        let txtModule = $("#select2-txtModule-container").text();
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                txtPermissions: txtPermissions,
                txtModule: txtModule,
                uuid: uuid,
                id_permissions: id_permissions,
            },
            url: "/adminpanel/permissions/" + uuid,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 400) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "-error").text(val[0]);
                    });
                } else {
                    toastr["info"]("Permissions berhasil di update");
                    clearData();

                    var oTable = $("#tblPermissions").dataTable();
                    oTable.fnDraw(true);
                }
            },
        });
    };

    deleteData = function (id) {
        toastr.error(
            "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
            "Tingkat Permissions akan di hapus dari User Permissions?",
            {
                showDuration: "300",
                hideDuration: "1000",
                progressBar: true,
                closeButton: false,
                allowHtml: true,
                onShown: function (toast) {
                    $("#confirmationRevertYes").click(function () {
                        $.ajax({
                            type: "DELETE",
                            dataType: "json",
                            url: "/adminpanel/permissions/" + id,
                            success: function (response) {
                                toastr["success"](
                                    "Permissions berhasil dihapus"
                                );
                                var oTable = $("#tblPermissions").dataTable();
                                oTable.fnDraw(true);
                                clearData();
                            },
                        });
                    });
                    $("#confirmationRevertNo").click(function () {
                        console.log("OK");
                    });
                },
            }
        );
    };
    $("#txtPermissions").on("change", () => {
        let module = $("#txtModule option:selected").val();
        let permissions = $("#txtPermissions option:selected").val();
        let txtModule = $("#txtModule").val();
        if(txtModule != null){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/adminpanel/permissions/" + module + "/check",
                success: function (response) {
                    $("#txtName").val(response.alias+'-'+permissions);
                },
            });
        }


    });
    $("#txtModule").on("change", () => {
        let module = $("#txtModule option:selected").val();
        let permissions = $("#txtPermissions option:selected").val();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/permissions/" + module + "/check",
            success: function (response) {
                $("#txtName").val(response.alias+'-'+permissions);
            },
        });

    });
     clearData();
});


