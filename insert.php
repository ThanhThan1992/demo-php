
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
    <body>
        <ul>  
            <form name = "insert" method = "POST" >  
                <li>ID:</li><li><input type   = "text" name   = "id" /></li>  
                <li>Name:</li><li><input type = "text" name = "name" /></li>  
                <li>Age:</li><li><input type  = "text" name  = "age" /></li>  
                <li>Porn:</li><li><input type = "text" name = "porn" /></li>  
                <li><input type = "submit" name="submit" /></li>  
            </form>  
        </ul>  
     </body>
</html>