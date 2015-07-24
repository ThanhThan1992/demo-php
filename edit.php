<?php echo '<link href="view.css" rel="stylesheet" type="text/css" />'; ?>
<?php
$id = $_GET["id"];
$db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root"); 
if(empty($_POST)) 
{
    $query = "SELECT * FROM student WHERE id={$id}"; 
    $result = pg_query($query);
    $item = pg_fetch_row($result);
}
 else {
     if($_POST["Update"])
        { 
          $query  = "SELECT * FROM student WHERE id={$id}"; 
          $result = pg_query($query);
          $item   = pg_fetch_row($result);
          $query = "UPDATE student SET name ='{$_POST["name"]}',age={$_POST["age"]},porn={$_POST["porn"]} WHERE id={$id}";
          $result = pg_query($query);
          echo'<script>window.location="http://localhost/demo-php/index.php";</script>';
          end();
        }
 }

?>
<html>
    <body align="center">
        <div id="main">
            <form name = "insert" method = "POST"  > 
                <table align="center">
                    <tr>
                        <td>ID:</td><td><input type   = "text" name   = "id" value = "<?php echo $item[0]?>" /></td> 
                    </tr>
                    <tr>
                        <td>Name:</td><td><input type = "text" name   = "name" value = "<?php echo $item[1]?>" /></td>
                    </tr>
                    <tr>
                        <td>Age:</td><td><input type  = "text" name   = "age" value = "<?php echo $item[2]?>" /></td> 
                    </tr>
                    <tr>
                        <td>Porn:</td><td><input type = "text" name   = "porn" value = "<?php echo $item[3]?>" /></td>  
                    </tr>
                    <tr>
                        <td></td><td><input type = "submit"value="Update" name="Update" /></td> 
                    </tr>
                </table>
            </form> 
        </div>
    </body>
</html>