$(document).ready(function () {
    $("#InputGolongan").hide();
    var table = $("#tblDipa").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/gtpd",
            type: "GET",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row) {
                    return row.golongan + "/" + row.grade;
                },
            },
            { data: "list_rank", name: "list_rank" },
            { data: "pangkat", name: "pangkat" },
            { data: "tpd", name: "tpd" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            { visible: false, targets: 1 },
            { className: "text-center", targets: 3 },
            { className: "text-center", targets: 4 },
        ],

        order: [
            [1, "ASC"],
        ],
    });

    new $.fn.dataTable.FixedHeader(table);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#tblGTPD").on("submit", function (e) {
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
                        toastr["success"](
                            "Data Golongan dan Tarif berhasil ditambahkan"
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
        $("#InputGolongan").hide();
        $("#txtGolongan").val("");
        $("#txtPangkat").val("");
        $("#select2-TxtPD-container").text("Pilih Salah Satu");
        $("#select2-TxtGrade-container").text("Pilih Salah Satu");
        $("#TxtPD").val("");
        $("#TxtGrade").val("");
        $("#ButtonGTP").show();
        $("span.txtGolongan-error").text("");
        $("span.txtPangkat-error").text("");
        $("span.TxtPD-error").text("");
        $("span.TxtGrade-error").text("");
        $("#txtPangkat").prop("disabled", false);
    };
    addData = function () {
        $("#InputGolongan").show();
        $("#save").show();
        $("#cancel").show();
        $("#update").hide();
        $("#ButtonGTP").hide();
        $("#txtGolongan").val("");
        $("#txtPangkat").val("");
        $("#TxtSelected").val("");
        $("#txtPangkat").focus();
    };

    editData = function (id) {
        $("#InputGolongan").show();
        $("#save").hide();
        $("#cancel").show();
        $("#update").show();
        $("#ButtonGTP").hide();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/gtpd/" + id + "/edit",
            success: function (response) {
                $("#txtGolongan").val(response.golongan);
                $("#txtPangkat").val(response.pangkat);
                $("#TxtPD").val(response.tpd);
                $("#select2-TxtGrade-container").text(response.grade);
                $("#select2-TxtPD-container").text(response.tpd);
                $("#TxtGrade").val(response.grade);
                $("#txtUUID").val(response.id);
                $("#txtPangkat").prop("disabled",true);
            },
        });

        $("#txtGolongan").focus();
    };

    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let txtGolongan = $("#txtGolongan").val();
        let txtPangkat = $("#txtPangkat").val();
        let TxtGrade = $("#TxtGrade").val();
        let TxtPD = $("#TxtPD").val();
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                uuid: uuid,
                txtGolongan: txtGolongan,
                txtPangkat: txtPangkat,
                TxtGrade: TxtGrade,
                TxtPD: TxtPD,
            },
            url: "/adminpanel/gtpd/" + uuid,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 400) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "-error").text(val[0]);
                    });
                } else {
                    toastr["info"]("Data Daftar Pejabat berhasil di update");
                    clearData();
                    var oTable = $("#tblDipa").dataTable();
                    oTable.fnDraw(true);
                }
            },
        });
    };

    deleteData = function (id) {
        toastr.error(
            "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
            "Data Daftar Pejabat akan dihapus?",
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
                            url: "/adminpanel/gtpd/" + id,
                            success: function (response) {
                                toastr["success"](
                                    "Data Daftar Pejabat berhasil dihapus"
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
     clearData();
});
