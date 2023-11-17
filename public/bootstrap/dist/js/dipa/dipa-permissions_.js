$(document).ready(function () {
    $("#form-input").hide();

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
       $("#tblPermissions").on("submit", function (e) {
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
        $("span.txtPermissionGroup-error").text("");
        $("#AddButtonGol").show();
        // $("#select2-TxtPegawai-container").text("Pilih Salah Satu");
        // $("#select2-TxtTPD-container").text("Pilih Salah Satu");
        // $("#TxtPegawai").val("");
        // $("#TxtTPD").val("");

    };
    addData = function () {
        clearData()
        $("#form-input").show();
        $("#AddButtonGol").hide();
        $("#save").show();
        $("#update").hide();
    };

    editData = function (id) {
        $("#form-input").show();
        $("#save").hide();
        $("#update").show();
        $("#AddButtonGol").hide();
        $("span.txtPermissions-error").text("");
        $("span.txtPermissionGroup-error").text("");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/permissions/" + id + "/edit",
            success: function (response) {
                // $("#select2-TxtPegawai-container").text(response.name);
                // $("#select2-TxtTPD-container").text(response.jabatan);
                // $("#txtUUID").val(response.id);
                // $("#id_pegawai").val(response.id_pegawai);
                // $("#TxtPegawai").val(response.id_pegawai);
                // $("#TxtTPD").val(response.jabatan);
            },
        });

    };
    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let id_pegawai = $("#id_pegawai").val();
        let txtPegawai = $("#select2-TxtPegawai-container").text();
        let txtTPD =  $("#select2-TxtTPD-container").text();
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                txtPegawai: txtPegawai,
                txtTPD: txtTPD,
                uuid: uuid,
                id_pegawai: id_pegawai,
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
                    toastr["info"]("Daftar Pejabat berhasil di update");
                    clearData();

                    var oTable = $("#tblPejabat").dataTable();
                    oTable.fnDraw(true);
                }
            },
        });
    };

    deleteData = function (id) {
        toastr.error(
            "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
            "Nama akan di hapus dari Daftar Pejabat?",
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
                            url: "/adminpanel/pejabat/" + id,
                            success: function (response) {
                                toastr["success"](
                                    "Daftar Pejabat berhasil dihapus"
                                );
                                var oTable = $("#tblPejabat").dataTable();
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
    $("#TxtPegawai").on("change", () =>{
        let value = $("#TxtPegawai option:selected").val();
        $("#id_pegawai").val(value);
    })
     clearData();
});


