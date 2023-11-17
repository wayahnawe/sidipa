$(document).ready(function () {
    $("#form-input").hide();

    var table = $("#tblDipa").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/organisasi",
            type: "GET",
        },
        columns: [
            { data: "nama_subdit", name: "nama_subdit" },
            { data: "prefix_subdit", name: "prefix_subdit" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            { className: "text-center", targets: 1   },
            { className: "text-center", targets: 2 }
        ],

        order: [[0, "ASC"]],
    });

    new $.fn.dataTable.FixedHeader(table);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
       $("#tblOrgchart").on("submit", function (e) {
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
                           "Subdit/Satker  berhasil ditambahkan"
                       );
                       clearData();

                       var oTable = $("#tblDipa").dataTable();
                       oTable.fnDraw(true);
                   }
               },
           });
       });
    });

    clearData = function () {
        $("#form-input").hide();
        $("#txtSubdit").val("");
        $("#txtPrefix").val("");
        $("#txtPrefix").prop("disabled", false);
        $("span.txtPrefix-error").text("");
        $("span.txtSubdit-error").text("");
    };
    addData = function () {
        $("#form-input").show();
        $("#save").show();
        $("#cancel").show();
        $("#update").hide();
        $("#txtSubdit").val("");
        $("#txtPrefix").val("");
        $("#txtPrefix").prop("disabled", false);
        $("#save").prop("disabled", false);
        $("span.txtSubdit-error").text("");
        $("#txtPrefix").focus();
    };

    editData = function (id) {
        $("#form-input").hide();
        $("#save").hide();
        $("#save").prop("disabled", true);
        $("#cancel").show();
        $("#update").show();
        $("#txtPrefix").prop("disabled", true);
        $("span.txtPrefix-error").text("");
        $("span.txtSubdit-error").text("");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/organisasi/" + id + "/edit",
            success: function (response) {
                $("#txtSubdit").val(response.nama_subdit);
                $("#txtPrefix").val(response.prefix_subdit);
                $("#txtUUID").val(response.id);
            },
        });
        $("#txtSubdit").focus();

    };
    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let txtSubdit = $("#txtSubdit").val();
        let prefix = $("#txtPrefix").val();
        console.log(prefix);
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                txtSubdit: txtSubdit,
            },
            url: "/adminpanel/organisasi/" + uuid,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 400) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "-error").text(val[0]);
                    });
                } else {
                    toastr["info"]("Subdit/Satker  berhasil di update");
                    clearData();

                    var oTable = $("#tblDipa").dataTable();
                    oTable.fnDraw(true);
                }
            }
        });
    };

    deleteData = function (id) {
        toastr.error(
            "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
            "Subdit/Satker akan dihapus?",
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
                            url: "/adminpanel/organisasi/" + id,
                            success: function (response) {
                                toastr["success"](
                                    "Subdit/Satker berhasil dihapus"
                                );
                                var oTable = $("#tblDipa").dataTable();
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
});


