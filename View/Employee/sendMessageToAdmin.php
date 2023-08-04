<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if($_POST['submit']){
  $notice = $_POST['sendmsg'];
  
  
  if ( $notice == "") {
    echo 'Write any  message to admin... go back to <a href="../../View/Employee/SendMessageToAdmin.php">try again</a>';
  }
  else if(str_word_count($notice)<3){
    echo 'You need to post a correct sentence formate';
    echo '<br><a href="../../View/Employee/SendMessageToAdmin.php">Try Again</a>';
  }


  
 
  else{
    
    $donnerSendM=[
                      'notice'=>$notice, 
                      
    ];
    $EmployeeSendMJson= json_encode( $employeeSendM );
    $jsonFile= fopen( "../../Model/Employee/employeeMsg.json", "w" );
    fwrite($jsonFile , $employeeSendMJson);
    fclose($jsonFile);
    header('location: ../../View/Employee/EmployeedashBoard.php');
  }
}
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Send Message To ADMIN|FundBD</title>
  <link rel="shortcut icon" href="../../assets/icon.png">
</head>
<body>
  <!-- ...............................Header Start....................... -->
  
    <fieldset>
      <table align="center">
        <tr>
          <td>
            <img src="../../assets/imgpsh_fullsize.png" alt="" srcset=""width="200" height="80">
          </td>
          
        </tr>
      </table>
      <table align="center">
        <tr>
          <td>
            <a href="./employeeDashboard.php">Dashboard</a>&nbsp;
            <a href="./viewProfile.php">Profile</a>&nbsp;
            <a href="./employeeNotification.php">Notification</a>&nbsp;
            
          </td>
        </tr>
      </table>
      <table align="right">
          <tr>
              <td>
                <a href="../../controller/logout.php">Logout</a>
              </td>
          </tr>

      </table>
    </fieldset>
    <!-- .................................Header Close..................... -->
    <!-- .................................Main Content..................... -->
    <fieldset>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <fieldset>
        
            <legend><b>Send Message To ADMIN</b></legend><br>
        
            <table align="center">


              <tr>
                <td>Write Your Description in Details  :</td>
                <td><input type="text" id="sendmsg" name="sendmsg" size="80" ></td>
            </tr>
            

            <table align="center">
              <tr>
                <td>
                    <input type="submit" name="submit" id="submit" value="SEND">
                  
                </td>
              </tr>
    
            </table> 
          
        </fieldset>
        </form>
    </fieldset>
    <!-- .................................Main Content..................... -->
    <!-- .................................Footer Start..................... -->
    <fieldset>
      <p align="center">Copyright	&#169;2021</p>
    </fieldset>
  </form>
  <!-- .................................Footer Close..................... -->

</body>
</html>