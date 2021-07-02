<?php
    require __DIR__.'/ConnectToDB.php';
    if(isset($_GET['NewUserRegistrationToken']) && isset($_GET['email'])){
        $UserName=htmlspecialchars($_GET['email']);
        $UserName=mysqli_real_escape_String($conn,$UserName);
        $sanitized_a = filter_var($UserName, FILTER_SANITIZE_EMAIL);
        if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
            $Token=htmlspecialchars($_GET['NewUserRegistrationToken']);
            $Token=mysqli_real_escape_String($conn,$Token);
            $sql_UserExist="SELECT `Token_EmailVerification`,`Account_Verification_status` FROM `userinfo` WHERE `Email_Id`='$UserName'";
            $query_result=mysqli_query($conn,$sql_UserExist);
            if(!$query_result)
                echo "Error Cause ->".mysqli_error()."<br>";
            $TotalRows=mysqli_num_rows($query_result);
            if($TotalRows>0){
                $row=mysqli_fetch_array($query_result);
                echo $row['Token_EmailVerification'];
                echo "<br>";
                echo  $row['Account_Verification_status'];
                if($row['Account_Verification_status']=='Unverified'){
                    if($row['Token_EmailVerification']==$Token){
                        if($query_result){
                            $sql_UpdateStatus="UPDATE `userinfo` SET `Account_Verification_status`='Verified' WHERE `Email_Id`='$UserName'";
                            $query_result=mysqli_query($conn,$sql_UpdateStatus);
                            echo '<script>alert("You are successfully registered. Please wait for a minute...now you will be reciving comic book on your registered mail id.")</script>';
                            echo "Note :- If you don't recive mail within 10min please enter this url http://mailrandomcomic.000webhostapp.com/getRandomComic.php";
                            echo "<br>Issue could be cron job not working properly on this webhost.<br>";
                        }
                        else{
                            echo "Error Cause :- ".mysqli_error($conn);
                        }
                    }
                    else{
                        echo '<script>alert("Failed to verify.")</script>';
                    }
                }
            }
        }
    }    
?>
