$(document).ready(function () {
     var table = $("#tblModule").DataTable({
         processing: true,
         serverSide: true,
         responsive: true,
         ajax: {
             url: "/adminpanel/module",
             type: "GET",
         },
         columns: [
             { data: "name", name: "name" },
            //  { data: "status", name: "status" },
              {
                  data: "status",
                  name: "status",
                  render: function (data, type, row) {
                      // console.log('Content of data is : '+data);

                      if (row.status != "1") {
                          sev =
                              '<span class="mb-1 badge bg-info">Active</span>';
                      } else {
                          sev =
                              '<span class="mb-1 badge bg-warning">Disable</span>';
                      }
                      // console.log('Content of sev is : '+sev);
                      return sev;
                  },
              },
             { data: "action", name: "action" },
         ],
         columnDefs: [{ className: "text-center", targets: 2 }],

         order: [[0, "ASC"]],
     });


    new $.fn.dataTable.FixedHeader(table);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#frmModule").on("submit", function (e) {
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
                        toastr["success"](
                            "Nama Module berhasil ditambahkan"
                        );
                        clearData();

                        var oTable = $("#tblModule").dataTable();
                        oTable.fnDraw(true);
                    }
                },
            });
        });
    });
    clearData = function () {
        $("#form-input").hide();
        $("span.txtName-error").text("");
        $("span.txtAlias-error").text("");
        $("span.txtStatus-error").text("");
        $("#btnTambah").show();
        $("#select2-txtStatus-container").text("Pilih Salah Satu");
        $("#txtName").val("");
        $("#txtAlias").val("");
        $("#txtStatus").val("");
         $("#txtName").prop("disabled", false);

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
        $("span.txtName-error").text("");
        $("span.txtAlias-error").text("");
        $("span.txtStatus-error").text("");
        $("#txtName").prop("disabled", true);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/module/" + id + "/edit",
            success: function (response) {
                if (response.status != "0") {
                    $("#select2-txtStatus-container").text("Disable");
                } else {
                    $("#select2-txtStatus-container").text("Active");
                }
                $("#txtName").val(response.name);
                $("#txtUUID").val(response.id);
                $("#txtAlias").val(response.alias);
                $("#txtStatus").val(response.status);
            },
        });
    };


    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let txtAlias = $("#txtAlias").val();
        let txtStatus = $("#txtStatus").val();
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                txtAlias: txtAlias,
                txtStatus: txtStatus,
                uuid: uuid,
                // id_permissions: id_permissions,
            },
            url: "/adminpanel/module/" + uuid,

            success: function (data) {

                    toastr["info"]("Module berhasil di update");
                    clearData();

                    var oTable = $("#tblModule").dataTable();
                    oTable.fnDraw(true);
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
                                var oTable = $("#tblModule").dataTable();
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
    // $("#txtPermissions").on("change", () => {
    //     let value = $("#txtPermissions option:selected").val();
    //     $("#id_permissions").val(value);
    // });
    clearData();
});


