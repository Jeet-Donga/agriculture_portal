$c = 0;
$("#show_pass4").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt4").attr("type", "text");
        $("#show_pass4").attr("title","Hide Password");
        $("#show_pass4 i").removeClass("os-icon-eye").addClass("os-icon-eye-off");
        $c++;
    } else {
        $("#txt4").attr("type", "password");
        $("#show_pass4").attr("title","Show Password");
        $("#show_pass4 i").addClass("os-icon-eye").removeClass("os-icon-eye-off");
        $c = 0;
    }
});

$c = 0;
$("#show_pass5").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt5").attr("type", "text");
        $("#show_pass5").attr("title","Hide Password");
        $("#show_pass5 i").removeClass("os-icon-eye").addClass("os-icon-eye-off");
        $c++;
    } else {
        $("#txt5").attr("type", "password");
        $("#show_pass5").attr("title","Show Password");
        $("#show_pass5 i").addClass("os-icon-eye").removeClass("os-icon-eye-off");
        $c = 0;
    }
});

$c = 0;
$("#show_pass6").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt6").attr("type", "text");
        $("#show_pass6").attr("title","Hide Password");
        $("#show_pass6 i").removeClass("os-icon-eye").addClass("os-icon-eye-off");
        $c++;
    } else {
        $("#txt6").attr("type", "password");
        $("#show_pass6").attr("title","Show Password");
        $("#show_pass6 i").addClass("os-icon-eye").removeClass("os-icon-eye-off");
        $c = 0;
    }
});

$c = 0;
$("#show_pass7").on("click", function ()
{
    if ($c == 0)
    {
        $("#txt7").attr("type", "text");
        $("#show_pass7").attr("title","Hide Password");
        $("#show_pass7 i").removeClass("os-icon-eye").addClass("os-icon-eye-off");
        $c++;
    } else {
        $("#txt7").attr("type", "password");
        $("#show_pass7").attr("title","Show Password");
        $("#show_pass7 i").addClass("os-icon-eye").removeClass("os-icon-eye-off");
        $c = 0;
    }
});