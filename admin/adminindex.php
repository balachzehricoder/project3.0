<?php include 'config.php'; 

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><script>var real="adminkey"</script><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users Management</title>
</head>

<body>
    <br><br><br>
    <h2>List of admin</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT * FROM admin";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$row[id]</td>
                        <td>$row[ADMIN_NAME]</td>
                        <td>$row[ADMIN_EMAILID]</td>
                        <td>$row[ADMIN_PASSWORD]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='adminedit.php?id=$row[ADMINid]'>Edit</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<script>

var pass=prompt("Please ENTER YOUR SECURITY KEY THEN YOU ENTER !","");
if (pass === real) {

}

else{
    window.location.href="index.php"

    alart("sorry your key is not valid for admin page Please try again ): ")


}


</script>
