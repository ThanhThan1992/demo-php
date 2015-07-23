<!DOCTYPE html>
<html>
    <?php  
        $db = pg_connect("host=localhost port=5432 dbname=TEST user=postgres password=root");
        $query = "SELECT * FROM student";
        $result = pg_query($query);
    ?>
    <body>
        <table border="1" cellspacing="2" cellpadding="2">
            <tr>
            <th><font face="Arial, Helvetica, sans-serif">ID</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Name</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Age</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Porn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Action</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
            </tr>
            <?php

                for ($i=0;$i<pg_numrows($result);$i++):
                    $id   = pg_result($result,$i,"id");
                    $name = pg_result($result,$i,"name");
                    $age  = pg_result($result,$i,"age");
                    $porn = pg_result($result,$i,"porn");
            ?>
            <tr>
            <a href="delete.php"></a>
            <a href="delete.php"></a>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $porn; ?></td>
                <td><a href="edit.php?id=<?php echo $id; ?>">Edit</a></td>
                <td><a href="delete.php?delete=<?php echo $id; ?>">delete</a></td>
            </tr>
            <?php endfor; ?>
            </table>
        <a href="insert.php">Insert</a>
    </body>
</html>
