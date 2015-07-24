<?php echo '<link href="view.css" rel="stylesheet" type="text/css" />'; ?>
<?php 
    $db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root"); 
    function  checkID()
    { 
      $bool;
      $query  = "SELECT * FROM student";
      $result = pg_query($query);
      for($i = 0;$i < pg_num_rows($result);$i++)
      {
          if($_POST["id"] == pg_result($result,$i,"id"))
          {
              $bool = false;
              break;
          }
          else { $bool = true;}
      }
      return $bool;
    }
    function check()
    {
      //var_dump(checkID());die();
      if(checkID() == FALSE )
      {
          return false;
      }
      return true;
    }
    if(isset($_POST['submit']) && $_POST['submit'])
    {
      $query  = "INSERT INTO student VALUES ('$_POST[id]','$_POST[name]', '$_POST[age]','$_POST[porn]')";
      //var_dump(check());die();
      if(check() == TRUE)
      {
         $result = pg_query($query); 
         echo'<script>window.location = "http://localhost/demo-php/index.php";</script>';
         end();
      }
      //echo'<script>window.location = "http://localhost/demo-php/insert.php";</script>';
      //end();
      echo 'id is duplicate';
    }
?>  
<html>
    <body align="center">
        <div id="main">
        
            <form name = "insert" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
                <table align="center">
                    <tr>
                        <td>ID:</td><td><input type   = "text" name   = "id" /></td> 
                    </tr>
                    <tr>
                        <td>Name:</td><td><input type = "text" name   = "name" /></td>
                    </tr>
                    <tr>
                        <td>Age:</td><td><input type  = "text" name   = "age" /></td> 
                    </tr>
                    <tr>
                        <td>Porn:</td><td><input type = "text" name   = "porn" /></td>  
                    </tr>
                    <tr>
                        <td></td><td><input type = "submit" name="submit" /></td> 
                    </tr>
                </table>
            </form>  
        
        </div>
     </body>
</html>