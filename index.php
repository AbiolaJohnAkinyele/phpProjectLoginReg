<?php
require "connect.php";
require 'security.php';

$records = array();

if(isset($_POST['submit'])){
    //if(isset($_POST['firstname'], $_POST['lastname'], $_POST['bio'])){
        $firstname  = trim($_POST['firstname']);
        $lastname   = trim($_POST['lastname']);
        $bio        = trim($_POST['bio']);
        
        //if(!empty($firstname) && !empty($lastname) && !empty($bio)){
            $insert = $conn->prepare("INSERT INTO people (firstname, lastname, bio, created) VALUES (?,?,?, now())");
            $insert->bind_param('sss', $firstname, $lastname, $bio);
            if($insert->execute()){
                header('Location: index.php');
                die();
            }
        //}
        
   // }
}

if($result = $conn->query("SELECT * FROM people")){
    if($result->num_rows){
        while($row = $result->fetch_object()){
            $records[] = $row;
        }
        $result->free();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UI</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
   <h3>Postgraduate</h3>
      <?php
       if(!count($records)){
           echo "No Records!";
       }else{
       ?>
       <table id="customers">
           <thead>
              <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Bio</th>
                  <th>Created</th>
              </tr>
           </thead>
           <tbody>
               
                <?php
           foreach($records as $r){
           ?>
              <tr>
                  <td><?php echo $r->firstname; ?></td>
                  <td><?php echo $r->lastname; ?></td>
                  <td><?php echo $r->bio; ?></td>
                  <td><?php echo $r->created; ?></td>
              </tr>
             <?php 
           } 
               ?>
           </tbody>
       </table>
       <?php
       }
           ?>
    <hr>
    
    
    <form action="" method="POST">
       <div class="field">
           <label for="firstname">First name</label>
           <input type="text" name="firstname" id="firstname">
        </div>
          <div class="field">
           <label for="lastname">Last name</label>
           <input type="text" name="lastname" id="lastname">
        </div>
          <div class="field">
           <label for="bio">Bio</label>
           <textarea name="bio" id="bio"></textarea>
       </div>
       <input type="submit" name="submit" value="Please Submit">
        
    </form>
    
</body>
</html>

5436.63






<?php
/*
//$result = $conn->query("SELECT * FROM people");
if($query = mysqli_query($conn, "SELECT * FROM people")){
    /*if($quer->num_rows){
    echo "yeah";
    }*/
   /* if(mysqli_num_rows($query)){
    echo "Yeah";
    }
}
*/