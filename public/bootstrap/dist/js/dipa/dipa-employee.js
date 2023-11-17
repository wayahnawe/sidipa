$(document).ready(function () {
    var table = $("#tblDipa").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/employee",
            type: "GET",
        },
        columns: [
            // {data: null,name:null,
            //     render: (data) => data.golongan + '/ ' + data.grade
            // },
            // { data: "golongan", name: "golongan" },
            // { data: "grade", name: "grade" },
            { data: "nip", name: "nip" },
            { data: "name", name: "name" },
            { data: "golongan", name: "golongan" },
            { data: "jabatan", name: "jabatan" },
            // { data: "subdit", name: "subdit" },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            // {
            //     render: (data, type, row) => data + " (" + row[2] + ")",
            //     targets: 0,
            // },
            //  { visible: false, targets: 1 },
            { className: "text-center", targets: 2 },
            { className: "text-center", targets: 4 },
        ],

        order: [[1, "ASC"]],
    });

    new $.fn.dataTable.FixedHeader(table);
});
