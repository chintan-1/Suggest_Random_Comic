<?php
    require __DIR__.'/ConnectToDB.php';
    $UserName=null;
    if(isset($_POST['Username'])){ 
        $UserName=htmlspecialchars($_POST['Username']);
        $UserName=mysqli_real_escape_String($conn,$UserName);

    }
    if(isset($_POST['NewUserbtn'])){
        require __DIR__.'\NewUser.php';
    }
    echo "<script>
        window.location.href='http://mailrandomcomic.000webhostapp.com/index.html';
    </script>";
?>

