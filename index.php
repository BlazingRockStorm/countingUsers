<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $tg=time();
        $tgout=60;
        $tgnew=$tg - $tgout;
        $conn=mysqli_connect("localhost","gryphon","123456","counting") or die("Failed to connect to MySQL: " . mysqli_connect_error());
        $sql="insert into useronline(tgtmp,ip,local) values('$tg','$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')";
        $query=mysqli_query($conn,$sql);
        $sql="delete from useronline where tgtmp < $tgnew";
        $query=mysqli_query($conn,$sql);
        $sql="SELECT DISTINCT ip FROM useronline WHERE local='$_SERVER[PHP_SELF]'";
        $query=mysqli_query($conn,$sql);
        $user = mysqli_num_rows($query);
        echo "user online :$user";
        ?>
    </body>
</html>
