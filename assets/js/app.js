$c = 0;
$("#show_pass").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt1").attr("type", "text");
        $("#show_pass").attr("title","Hide Password");
        $("#show_pass i").removeClass("uil-eye").addClass("uil-eye-slash");
        $c++;
    } else {
        $("#txt1").attr("type", "password");
        $("#show_pass").attr("title","Show Password");
        $("#show_pass i").addClass("uil-eye").removeClass("uil-eye-slash");
        $c = 0;
    }
});
$c = 0;
$("#show_pass2").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt2").attr("type", "text");
        $("#show_pass2").attr("title","Hide Password");
        $("#show_pass2 i").removeClass("uil-eye").addClass("uil-eye-slash");
        $c++;
    } else {
        $("#txt2").attr("type", "password");
        $("#show_pass2").attr("title","Show Password");
        $("#show_pass2 i").addClass("uil-eye").removeClass("uil-eye-slash");
        $c = 0;
    }
});
$c = 0;
$("#show_pass3").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt3").attr("type", "text");
        $("#show_pass3").attr("title","Hide Password");
        $("#show_pass3 i").removeClass("uil-eye").addClass("uil-eye-slash");
        $c++;
    } else {
        $("#txt3").attr("type", "password");
        $("#show_pass3").attr("title","Show Password");
        $("#show_pass3 i").addClass("uil-eye").removeClass("uil-eye-slash");
        $c = 0;
    }
});