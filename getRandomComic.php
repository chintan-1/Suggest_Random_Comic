<?php
    require __DIR__.'/ConnectToDB.php';
    $sql_UserExist ="SELECT * FROM `userinfo` WHERE `Account_Verification_status`='Verified'";
    $query_result=mysqli_query($conn,$sql_UserExist);
    $TotalRows=mysqli_num_rows($query_result);
    if($TotalRows){
        $row = mysqli_fetch_assoc($query_result);
        while ($row) {
                require __DIR__.'/SendMailConfig.php';
                $UserName=$row["Email_Id"];
                $comicNumber=rand(0,2476);
                $url="http://xkcd.com/$comicNumber/info.0.json";
                $json = file_get_contents($url);
                $json = json_decode($json); 
                $RediretUserTOurlToUnsubscribe="'http://mailrandomcomic.000webhostapp.com/Unsubscribe.php?email=".$UserName."&UnsubscribeToken=".$row['Token_Unsubscribe'];
                $mail->addAddress($UserName);
       
                $mail->isHTML(true);                                  
                $mail->Subject = 'Hi you have recived new comic.';
                $mail->Body    = "
                                Hi<br>
                                Here is a new comic <b>$json->safe_title<b> for you.<br>
                                <img src=$json->img alt='Image broken'>
                                <br>
                                <a href='https://xkcd.com/$comicNumber/'>New Comic</a><br>
                                Click on the link above to Read.<br>
                                <br>
                                <a href=$RediretUserTOurlToUnsubscribe>Unsubscribe</a>
                                <br>";
                $mail->send();
                $row = mysqli_fetch_assoc($query_result);
                echo "Mail has been sent successfully!";
        }
    }
    echo "<script>
        window.location.href='http://mailrandomcomic.000webhostapp.com/index.html';
    </script>";
?>
