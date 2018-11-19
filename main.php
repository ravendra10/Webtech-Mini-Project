<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {font-family: Verdana, sans-serif; margin: 0;}
h2{font-family: Bookman Old Style;
    margin-left: 20px;}
ul.sidenav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    -webkit-animation: mymove 5s infinite; /* Safari 4.0 - 8.0 */
    animation: mymove 5s infinite;
    animation: example 5s linear 2s infinite alternate;
}

@-webkit-keyframes mymove {
    from {left: 0px;}
    to {left: 300px;}
}

/* Standard syntax */
@keyframes mymove {
    from {left: 0px;}
    to {left: 300px;}
}

ul.sidenav li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}
 
ul.sidenav li a.active {
    background-color: #4CAF50;
    color: white;
}

ul.sidenav li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

div.content {
    margin-left: 25%;
    padding: 1px 16px;
    height: 1000px;
}

@media screen and (max-width: 6000px) {
    ul.sidenav {
        width: 100%;
        height: auto;
        position: relative;
    }
    ul.sidenav li a {
        float: left;
        padding: 15px;
    }
    div.content {margin-left: 0;}
}

@media screen and (max-width: 9000px) {
    ul.sidenav {
        width: 100%;
        height: auto;
        position: relative;
    }
    ul.sidenav li a {
        float: left;
        padding: 15px;
    }
    div.content {margin-left: 0;}
}
#div1 {animation-timing-function: linear;}

input {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 35%;
    box-sizing: border-box;
} 

p{

    font-family: Bookman Old Style;
    font-size: 50px;

}
.sign{
    
    border-right-style: groove;
    margin-left: 15%;
    margin-right:20%;
    margin-top: 5%;
    margin-bottom: 0%;
}

.body{
    background-image: url("pic.jpg");
    position: relative;

}
#signup{
    margin-right: 0px;
    align-self: right;
}
.but{
    padding: 10px;
    background-color: #4CAF50;
    border-style: none;

}
.but:hover{
    background-color: #4CBF50;
}

</style>
</head>
<body class="body">
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="Sports_Network";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    /*
    if(!$conn){
        die("Connect failed".mysqli_connect_error());
    }
    $sql = "CREATE DATABASE Sports_Network";
    if(mysqli_query($conn,$sql)) {
        echo "Data base created";
    */
    /*
    $sql = "CREATE TABLE member_details (name VARCHAR(30),email VARCHAR(30) ,username VARCHAR(30) ,password VARCHAR(30),sport VARCHAR(10),notify VARCHAR(5))";
    if(mysqli_query($conn,$sql)){
        echo "Table created";
    } */
    $sql="SELECT * FROM member_details WHERE username LIKE '$_POST[Username]' AND password LIKE '$_POST[Password]'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res, MYSQLI_NUM);
    $log='Login';
    foreach ($_POST as $key => $value) {
        if($key=='Signup')
            {$log='Signup';}
    }
    
    /*$sql="DELETE FROM member_details
          WHERE username='ravi10'";
        if(mysqli_query($conn,$sql)){
            echo "DATA deleted successfully";
        }*/
        
            /*echo "Error : ".$sql."<br>".mysqli_error($conn);*/

        /*
        $sql="SELECT student_name,student_id,student_aderess FROM student_details";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "id : ".$row["student_id"]."<br>".
                " Name :" . $row["student_name"]."<br>".
                " Address : ".$row["student_aderess"]."<br>";
            }
        }*/
        /*else{ echo "0 results";}*/
        
    /*
    else
    {
        echo "Error".mysqli_error($conn);
    }*/
       
?>
<script type="text/javascript">/*
    var log = document.getElementById("logged");
    if(sessionStorage.username){
        log.innerHTML="Hi "+sessionStorage.getItem("username");
    }
    else
    {
      log.innerHTML="Hi";  
    }*/
</script>


<header>
  <h2 > Sports Network 
  
  <div align="right" style="margin-right: 100px; font-family: Bradley Hand ITC; font-size: 30px;" id="logged">
    <?php if($row>1)
            {echo "Hi ".$_POST['Username'];}
            if(mysqli_query($conn,$sql) && $log=='Signup')
            {
                $sql="INSERT INTO member_details (name,email,username,password,sport,notify)
                    VALUES ('$_POST[Name]','$_POST[Email]','$_POST[Username]','$_POST[Password]','$_POST[sport]','$_POST[notify]')";
                if(mysqli_query($conn,$sql)){
                    echo "Hi ".$_POST['Username'];
                }
            }
    ?>
     <input type="text" placeholder="Search">   
    </div>
</h2>
</header>

<!--<img src="menu.png" style="align-self: left; border-top:none;border-left:none;margin-top: none; margin-left: none;" onclick="createmenu();">--> 
<div id="div1" align="center" >
<ul class="sidenav">

  <li><a class="active" href="main.html">Home</a></li>
  <li><a href="NBA.html">NBA</a></li>
  <li><a href="football.html">SOCCER</a></li>
  <li><a href="webtech project.html">CRICKET</a></li>
  <li id= "signup" align="right"> <a href="form.html"> SIGN UP</a></li>
</ul>


<div class="sign" align="right">
<p align="center"> sign In </p>

<form>
    <input type="text" name="name" placeholder="Username"><br>

    <input type="password" name="password" placeholder="Password"><br>
    <input type="button" value="Log In" class='but'><br>
    <h5 align="center"> <a href=""> Forgot Password ? </a></h5>

</form>
</div>
</div>
<script>
    function createmenu(){
        if(document.getElementByClassName('div1')!=null){
            return;
        }

        var a = document.createElement('div');
        a.className = "div1";
        var ul = document.createElement("ul");
        ul.className = "sidenav";

        var li = document.createElement("li");
        li.value = "Home";
        ul.appendChild(li);
                var li = document.createElement("li");
        li.value = "NBA";
        ul.appendChild(li);
                var li = document.createElement("li");
        li.value = "Soccer";
        ul.appendChild(li);
                var li = document.createElement("li");
        li.value = "Cricket";
        ul.appendChild(li);
        a.appendChild(ul);
        document.body.appendChild(a);

    }
</script>
<?php 

mysqli_close($conn);
?>

</body>
</html>
