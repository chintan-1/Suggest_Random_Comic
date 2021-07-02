<?php
    require __DIR__.'/ConnectToDB.php';
    if(isset($_GET['UnsubscribeToken']) && isset($_GET['email'])){
        $UserName=htmlspecialchars($_GET['email']);
        $UserName=mysqli_real_escape_String($conn,$UserName);
        $sql_UserExist="SELECT `Token_Unsubscribe` FROM `userinfo` WHERE `Email_Id`='$UserName'";
        $query_result=mysqli_query($conn,$sql_UserExist);
        $TotalRows=mysqli_num_rows($query_result);
        $row=mysqli_fetch_assoc($query_result);
        if($TotalRows){
            if($row['Token_Unsubscribe']==htmlspecialchars($_GET['UnsubscribeToken'])){
                $sql_delete="DELETE FROM `userinfo` WHERE `Email_Id`='$UserName'";
                $query_result=mysqli_query($conn,$sql_delete);
                if($query_result){
                    echo '<script>alert("You have successfully unsubscribed from the service.")</script>';
                }
                else{
                    echo '<script>alert("Please try again.")</script>';
                }
            }
            else{
                echo '<script>alert("Somethin went wrong.")</script>';
            }
        }
        else{
            echo '<script>alert("Please first register your email id.")</script>';
        }
    }
    echo "<script>
        window.location.href='http://mailrandomcomic.000webhostapp.com/index.html';
    </script>";
?>
