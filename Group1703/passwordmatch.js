<script>
function mypasswordmatch()
{
    var pass1 = $("‪#‎password‬").val();
    var pass2 = $("‪#‎password2‬").val();
    if (pass1 != pass2)
    {
        alert("Passwords do not match");
        return false;
    }
    else
    {
        $( "‪#‎reset‬" ).submit();
    }
}
</script>