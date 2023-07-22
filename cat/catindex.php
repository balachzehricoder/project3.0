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

    <h2>Add Category</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br>
        <label for="name">Category picture:</label>
        <input type="file" id="name" name="picture" required>
        <br>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>
