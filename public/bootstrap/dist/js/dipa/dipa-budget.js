$(document).ready(function () {
    var table = $("#tblBudget").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/adminpanel/budget",
            type: "GET",
        },
        columns: [
            { data: "tahun_anggaran", name: "tahun_anggaran" },
            { data: "kode_anggaran", name: "kode_anggaran" },
            { data: "nama_anggaran", name: "nama_anggaran" },
            // {
            //     data: null,
            //     render: function (data, type, row) {
            //         return row.sd_anggaran + "-" + row.cp_anggaran;
            //     },
            // },
            {
                data: "budget_anggaran",
                name: "budget_anggaran",
                render: $.fn.dataTable.render.number(","),
            },
            { data: "action", name: "action" },
        ],
        columnDefs: [
            // { className: "text-end", targets: 2 },
            { className: "text-end", targets: 3 },
            { className: "text-center", targets: 4 },
        ],

        order: [
            [0, "DESC"],
            [1, "ASC"],
        ],
    });

    new $.fn.dataTable.FixedHeader(table);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".yearpicker").yearpicker({
        // Initial Year
        year: null,
        // Start Year
        startYear: null,
        // End Year
        endYear: null,
        // Element tag
        itemTag: "li",
        // Default CSS classes
        selectedClass: "selected",
        disabledClass: "disabled",
        hideClass: "hide",
        // Custom template
        template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>
  `,
    });
    $(".yearpicker").yearpicker({
        onShow: null,
        onHide: null,
        onChange: function (value) {},
    });
    $("#kode_anggaran").mask('000.00.AA.0000.AAA.000.000.A.000000.00');
 
    $(function () {
        $("#tblBudgetAnggaran").on("submit", function (e) {
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
                            "Data Anggaran DIPA berhasil ditambahkan"
                        );
                        clearData();
                        var oTable = $("#tblBudget").dataTable();
                        oTable.fnDraw(true);
                    }
                },
            });
        });
    });
    clearData = function () {
        $("#form-input").hide();
        $("#tahun_anggaran").val("");
        $("#txtUUID").val("");
        $("#kode_anggaran").val("");
        $("#txtBudget_Anggaran").val("");
        $("#budget_anggaran").val("");
        $("#nama_anggaran").val("");
        $("span.tahun_anggaran-error").val("");
        $("span.kode_anggaran-error").val("");
        $("span.budget_anggaran-error").val("");
        $("span.nama_anggaran-error").val("");
        $("#tahun_anggaran").prop("disabled", false);
        $("#FormButton").show();

    };

    $("#txtBudget_Anggaran").change(function () {
        var number = $("#txtBudget_Anggaran").val();
        var num2text =
            number.trim() && (n = parseInt(number.replace(/[^\d.]/g, "")));
        $("#budget_anggaran").val(num2text);
        console.log(num2text);
    });
    addData = function () {
        $("#form-input").show();
        $("#save").show();
        $("#cancel").show();
        $("#update").hide();
        $("#FormButton").hide();
        $("#tahun_anggaran").val("");
        $("#txtUUID").val("");
        $("#id_anggaran").val("");
        $("#kode_anggaran").val("");
        $("#txtBudget_Anggaran").val("");
        $("#budget_anggaran").val("");
        $("#nama_anggaran").val("");
        $("span.tahun_anggaran-error").val("");
        $("span.kode_anggaran-error").val("");
        $("span.budget_anggaran-error").val("");
        $("span.nama_anggaran-error").val("");
    };

    editData = function (id) {
        $("#form-input").show();
        $("#save").hide();
        $("#cancel").show();
        $("#update").show();
        $("#FormButton").hide();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/adminpanel/budget/" + id + "/edit",
            success: function (response) {
                $("#tahun_anggaran").val(response.tahun_anggaran);
                $("#kode_anggaran").val(response.kode_anggaran);
                $("#txtBudget_Anggaran").val(
                    numberToCurrency(response.budget_anggaran)
                );
                $("#txtUUID").val(response.id);
                $("#budget_anggaran").val(response.budget_anggaran);
                $("#nama_anggaran").val(response.nama_anggaran);
                $("#tahun_anggaran").prop("disabled", true);
            },
        });
    };

    updateData = function (id) {
        let uuid = $("#txtUUID").val();
        let kode_anggaran = $("#kode_anggaran").val();
        let budget_anggaran = $("#budget_anggaran").val();
        let nama_anggaran = $("#nama_anggaran").val();
        $.ajax({
            type: "PUT",
            dataType: "json",
            data: {
                kode_anggaran: kode_anggaran,
                budget_anggaran: budget_anggaran,
                uuid: uuid,
                nama_anggaran: nama_anggaran,
            },
            url: "/adminpanel/budget/" + uuid,
            beforeSend: function () {
                $(document).find("span.error-text").text("");
            },
            success: function (data) {
                if (data.status == 400) {
                    $.each(data.error, function (prefix, val) {
                        $("span." + prefix + "-error").text(val[0]);
                    });
                } else {
                    toastr["info"]("Data Anggaran DIPA berhasil di update");
                    clearData();

                    var oTable = $("#tblBudget").dataTable();
                    oTable.fnDraw(true);
                }
            },
        });
    };

     clearData();

      deleteData = function (id) {
          toastr.error(
              "<div class='form-group-inline text-center py-2'><button type='button' id='confirmationRevertYes' class='btn btn-danger'>Yes</button> <button type='button' id='confirmationRevertNo' class='btn btn-primary'>No</button></div>",
              "Data Anggaran DIPA akan dihapus?",
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
                              url: "/adminpanel/budget/" + id,
                              success: function (response) {
                                  toastr["success"](
                                      "Data Anggaran DIPA berhasil dihapus"
                                  );
                                  var oTable = $("#tblBudget").dataTable();
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
