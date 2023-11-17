$(document).ready(function () {
    var table = $("#tblPermissions").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/roles",
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
})
