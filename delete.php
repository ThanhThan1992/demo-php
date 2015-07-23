
<?php  

if(isset($_GET["delete"]))
{    
   $id=$_GET["delete"];
   $db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root");
   $query = "DELETE FROM student WHERE  id={$id}"; 
   //var_dump($query);
   //die();
   $result = pg_query($query);
   //var_dump($result);die();
   echo'<script>window.location="http://localhost/demo-php/index.php";</script>';
   end();
}
?>  