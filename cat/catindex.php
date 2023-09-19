<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <?php
    function addCategory($name, $description, $picture) {
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "phonesell.com");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the INSERT query
        $stmt = $conn->prepare("INSERT INTO categories (name, description, picture) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $description, $picture);

        // File upload handling
        $target_dir = "category_pictures/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            echo "Category added successfully.";
        } else {
            echo "Error adding category: " . $stmt->error;
        }

        // Close the statement and the connection
        $stmt->close();
        $conn->close();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $picture = "uploads/" . basename($_FILES["picture"]["name"]);

        addCategory($name, $description, $picture);
    }
    ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #f4f4f4;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Add Category</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="picture">Category picture:</label>
                <input type="file" id="picture" name="picture" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Category" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>
    </form>
</body>
</html>
