$(document).ready(function () {
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
                            toastr["error"](val[0]);
                            $("span." + prefix + "-error").text(val[0]);
                        });
                    } else {
                        toastr["success"]("Data Pegawai berhasil ditambahkan");
                        document.location.href = "/adminpanel/employee";
                    }
                },
            });
        });
    });

    $("#DataGapok").change(function () {
        var DataGapok = $("#DataGapok").val();
        var txtGapok =
            DataGapok.trim() &&
            (n = parseInt(DataGapok.replace(/[^\d.]/g, "")));
        $("#gapok").val(txtGapok);
    });
    $("#is_pejabat").change(function () {
        if ($("#is_pejabat").is(":checked")) {
            $("#ispejabat").val("true");
        } else {
            $("#ispejabat").val("false");
        }
    });

});
