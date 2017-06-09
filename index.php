<html>
   
   <head>
      <title>300 Computer Science Dept. Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'mysql';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $first_name = addslashes ($_POST['first_name']);
               $last_name = addslashes ($_POST['last_name']);
            }else {
               $first_name = $_POST['first_name'];
               $last_name = $_POST['last_name'];
            }
            
            	$email = $_POST['email'];
            
            	$matric_no = $_POST['matric_no'];

            $sql = "INSERT INTO csc ". "(first_name,last_name,email,matric_no) ". "VALUES('$first_name','$last_name', '$email', '$matric_no')";
               
            mysql_select_db('dept');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
            
            mysql_close($conn);
         }
         else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">First Name</td>
                        <td><input name = "first_name" type = "text" 
                           id = "first_name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Last Name</td>
                        <td><input name = "last_name" type = "text" 
                           id = "last_name"></td>
                     </tr>
                 	<tr>
                        <td width = "100">Email</td>
                        <td><input type='email' name='email' placeholder='labaja@email.com'
                           id = "email"></td>
                     </tr>
                  	<tr>
                        <td width = "100">Matric No</td>
                        <td><input name = "matric_no" type = "text" 
                           id = "matric_no"></td>
                     </tr>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Register">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>

