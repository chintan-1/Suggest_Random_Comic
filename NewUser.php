<?php
    $VerifyNewUserToken=bin2hex(random_bytes(20));
    $UnsubscribeServiceToken=bin2hex(random_bytes(20));
    $sql_UserExistWithVerifiedAccount="SELECT * FROM `userinfo` WHERE `Email_Id`='$UserName' and `Account_Verification_status`='verified'";
    $query_result=mysqli_query($conn,$sql_UserExistWithVerifiedAccount);
    $TotalRows=NULL;
    if(mysqli_num_rows($query_result)){
        echo '<script>alert("Your account is already registered with us.")</script>';
    }
    else{
        $SendVerificationMail=true;
        $sql_UserExistWithUnverifiedAccount="SELECT * FROM `userinfo` WHERE `Email_Id`='$UserName' and `Account_Verification_status`='Unverified'";
        $query_result=mysqli_query($conn,$sql_UserExistWithUnverifiedAccount);
        if(!$query_result)
                echo "Error Cause ->".mysqli_error($conn)."<br>";
        if(mysqli_num_rows($query_result)==0){
            $sql_insert="INSERT INTO `userinfo` (`Email_Id`, `Token_EmailVerification`, `Token_Unsubscribe`) VALUES ('$UserName', '$VerifyNewUserToken', '$UnsubscribeServiceToken')";
            $query_result=mysqli_query($conn,$sql_insert);
            if(!$query_result)
                echo "Error Cause ->".mysqli_error($conn)."<br>";
            echo "<script>alert('We have sent you verification mail again.')</script>";
        }
        else{
            $row=mysqli_fetch_assoc($query_result);
            $VerifyNewUserToken=$row['Token_EmailVerification'];
            echo "<script>alert('We have sent you verification mail again.')</script>";
        }
        require __DIR__.'/SendVerificationMail.php';
    }
    echo "<script>
        window.location.href='http://mailrandomcomic.000webhostapp.com/index.html';
    </script>";
?>
