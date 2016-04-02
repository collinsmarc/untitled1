<? include('db.php');

if(isset($_GET['action']))
{          
    if($_GET['action']=="reset")
    {
        $encrypt = mysqli_real_escape_string($connection,$_GET['encrypt']);
        $query = "SELECT studentID FROM users where md5(90*13+id)='".$encrypt."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
        if(count($Results)>=1)
        {
 
        }
        else
        {
            $message = 'Invalid key please try again. <a href="">Forget Password?</a>';
        }
    }
}
elseif(isset($_POST['action']))
{
 
    $encrypt      = mysqli_real_escape_string($connection,$_POST['action']);
    $password     = mysqli_real_escape_string($connection,$_POST['password']);
    $query = "SELECT studentID FROM members where md5(90*13+id)='".$encrypt."'";
 
    $result = mysqli_query($connection,$query);
    $Results = mysqli_fetch_array($result);
    if(count($Results)>=1)
    {
        $query = "update members set password='".md5($password)."' where studentID='".$Results['studentID']."'";
        mysqli_query($connection,$query);
 
        $message = "Your password changed sucessfully <a href=\'http://marcwebs.azurewebsites.net/Group1703/index.html'>click here to login</a>.";
    }
    else
    {
        $message = 'Invalid key please try again. <a href="">Forget Password?</a>';
    }
}
else
{
    header("location: /index.html");
}

?>

