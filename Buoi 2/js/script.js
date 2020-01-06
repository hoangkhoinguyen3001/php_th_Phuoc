$(document).ready(function () {
    $("#fldCN").hide();

    $("#btnNext").click(function (e) {
        $("#fldTK").hide();
        $("#fldCN").show();
        $("#txtHoTen").focus();
    });

    $("#btnPrevious").click(function (e) {
        $("#fldTK").show();
        $("#fldCN").hide();
        $("#txtTenTK").focus();
    });

    $("#lblDangKi").click(function (e) {
        $("#txtTenTK").val("admin");
        $("#txtMK").val("123456");
        $("#txtMK2").val("admin");
        $("#txtEmail").val("admin@domain.com");
        $("#txtHoTen").val("Nguyễn Văn Ad Min");
        $("#txtSDT").val("0901234567");
        $("#txtTenTK").val("admin");
        $("#cboNgheNghiep").val("gv");
    });
});