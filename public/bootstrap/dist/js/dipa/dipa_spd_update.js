// $("#type_perjalanan").change(function(){
//     console.log("Change")
// })

if ($("#type_perjalanan").val() != null) {
    var txtUUID = $("#txtUUID").val();
    $("#nama_peserta").attr("multiple", "multiple");
    $.get("getpeserta/" + txtUUID, function (data) {
        $("#nama_peserta").html(data);
    });
    $("#nama_peserta").select2({
        placeholder: "Pilih Peserta",
        allowClear: false,
        ajax: {
            url: "list_peserta" + "/" + txtUUID,
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term, // search term
                };
            },
            processResults: function ({ data }) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name,
                        };
                    }),
                };
            },
            cache: true,
        },
    });
}

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    $("#frmInput").on("submit", function (e) {
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
                    toastr["success"]("User berhasil diupdate");
                    document.location.href = "/adminpanel/users";
                }
            },
        });
    });
});

//  $("#selectmhs").change(function () {
//      var idmhs = $("#selectmhs").val();

//      $("#selectmk").attr("multiple", "multiple");
//      $.get("{{ url('ngampumk') }}/" + idmhs, function (data) {
//          $("#selectmk").html(data);
//      });
//      $("#selectmk").select2({
//          placeholder: "Pilih Matakuliah",
//          allowClear: true,
//          ajax: {
//              url: "{{ url('selectmk') }}" + "/" + idmhs,
//              processResults: function ({ data }) {
//                  return {
//                      results: $.map(data, function (item) {
//                          return {
//                              id: item.id,
//                              text: item.nama_matakuliah,
//                          };
//                      }),
//                  };
//              },
//          },
//      });
//  });
