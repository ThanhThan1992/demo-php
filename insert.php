
<?php  
$db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root");  
$query = "INSERT INTO student VALUES ('$_POST[id]','$_POST[name]',  
'$_POST[age]','$_POST[porn]'  
)";  
$result = pg_query($query);   
//header("Location: http://localhost/demo-php/index.php");
?>  
<html>
    <body>
<ul>  
<form name="insert" method="POST" >  
<li>ID:</li><li><input type="text" name="id" /></li>  
<li>Name:</li><li><input type="text" name="name" /></li>  
<li>Age:</li><li><input type="text" name="age" /></li>  
<li>Porn:</li><li><input type="text" name="porn" /></li>  

<li><input type="submit" /></li>  
</form>  
</ul>  
        </body>
</html>