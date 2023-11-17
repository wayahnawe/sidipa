$(document).ready(function () {
    var table = $("#tblTarif").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/tarif",
            type: "GET",
        },
        columns: [
            { data: "nama", name: "nama" },
            { data: "lokasi", name: "lokasi" },
            {
                data: "uang_saku",
                name: "uang_saku",
                render: $.fn.dataTable.render.number(","),
            },
            {
                data: "uang_harian",
                name: "uang_harian",
                render: $.fn.dataTable.render.number(","),
            },
            { data: "mata_uang", name: "mata_uang" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            { className: "text-end", targets: 2 },
            { className: "text-end", targets: 3 },
            { className: "text-center", targets: 5 },
        ],

        order: [[0, "ASC"]],
    });

    new $.fn.dataTable.FixedHeader(table);

    deleteData = function (id) {
        toastr.error(
            "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
            "Data Tarif Uang Harian akan dihapus?",
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
                            url: "/adminpanel/tarif/" + id,
                            success: function (response) {
                                toastr["success"](
                                    "Data Tarif Uang Harian berhasil dihapus"
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
