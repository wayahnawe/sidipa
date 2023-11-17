$(document).ready(function () { 
    var table = $("#tblJalDin").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/perjalanan_dinas",
            type: "GET",
        },
        columns: [
            { data: "nomor", name: "nomor" },
            { data: "dasarpelaksanaan", name: "dasarpelaksanaan" },
            {
                data: "tglberangkat",
                name: "tgl_berangkat",
                render: function (data) {

                    return moment(data).isValid()
                        ? moment(data).format("L")
                        : "-";
                },
            },
            {
                data: "tglkembali",
                name: "tglkembali",
                render: function (data) {
                    var locale = "id";
                    return moment(data).isValid()
                        ? moment(data).format("L")
                        : "-";
                },
            },
            { data: "tujuan", name: "tujuan" },
            { data: "status", name: "status" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            // {
            //     render: (data, type, row) => data + " (" + row[2] + ")",
            //     targets: 0,
            // },
            //  { visible: false, targets: 1 },
            // { className: "text-center", targets: 2 },
            { className: "text-center", targets: 6 },
        ],

        order: [[0, "ASC"]],
    });

    new $.fn.dataTable.FixedHeader(table);

});
