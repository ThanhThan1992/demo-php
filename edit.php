<?php
$id = $_GET["id"];
$db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root"); 
if(empty($_POST))
//$id = $_GET["id"];
//$db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root");  
{
$query = "SELECT * FROM student WHERE id={$id}"; 
$result = pg_query($query);
$item = pg_fetch_row($result);
}
 else {
    $query="UPDATE student
SET name ={$_POST["name"]},age={$_POST["age"]},porn={$_POST["porn"]}
WHERE id={$id}";
$result = pg_query($query);
 }

?>

<form name="insert" method="POST" action="">  
<li>ID:</li><li><input type="text" name="id" value="<?php echo $item[0]?>"/></li>  
<li>Name:</li><li><input type="text" name="name"  value="<?php echo $item[1]?>"/></li>  
<li>Age:</li><li><input type="text" name="age"  value="<?php echo $item[2]?>"/></li>  
<li>Porn:</li><li><input type="text" name="porn"  value="<?php echo $item[3]?>"/></li>  
<li><input type="submit" value="Update"/></li>  
</form> 