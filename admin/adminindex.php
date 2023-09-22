<?php error_reporting(0) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr:hover {background-color: #ddd;}

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <a class="btn btn-primary" href="/project3.0/admin/index.php">Back</a>
    <br><br><br>
    <h2 style="text-align:center;">List of Users</h2>
    <br>
    <div class="table-responsive"> <!-- Add this div -->
        <table class="table">
            <thead>
                <tr>
                    <th>ADMINid</th>
                    <th>ADMIN_NAME</th>
                    <th>ADMIN_EMAILID</th>
                    <th>ADMIN_PASSWORD</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM admin";
                $result = $conn->query($sql);
                if (!$result) {
                    die("invalid query:" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
<td>$row[ADMINid]</td>
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
    </div> <!-- Close the div -->
</body>
</html>