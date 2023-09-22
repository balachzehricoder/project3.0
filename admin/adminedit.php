<?php
include 'config.php';
$id = "";
$ADMIN_NAME = "";
$ADMIN_EMAILID = "";
$ADMIN_PASSWORD = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Show the method of the admin
    if (!isset($_GET["id"])) {
        header("location: profile.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM admin WHERE ADMINid = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: profile.php");
        exit;
    }

    $ADMINid = $row["ADMINid"]; // Replace with the correct column name
    $ADMIN_NAME = $row["ADMIN_NAME"];
    $ADMIN_EMAILID = $row["ADMIN_EMAILID"];
    $ADMIN_PASSWORD = $row["ADMIN_PASSWORD"];

} else {
    $id = $_POST["id"];
    $ADMIN_NAME = $_POST["ADMIN_NAME"];
    $ADMIN_EMAILID = $_POST["ADMIN_EMAILID"];
    $ADMIN_PASSWORD = $_POST["ADMIN_PASSWORD"];

    if (empty($ADMIN_NAME) || empty($ADMIN_EMAILID) || empty($ADMIN_PASSWORD)) {
        $errorMessage = "ALL the fields are required";
    } else {
        $sql = "UPDATE admin SET ADMIN_NAME = '$ADMIN_NAME', ADMIN_EMAILID = '$ADMIN_EMAILID', ADMIN_PASSWORD = '$ADMIN_PASSWORD' WHERE ADMINid = $id";

        $result = $conn->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
        } else {
            $successMessage = "Admin updated correctly";
            header("location: adminindex.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your meta tags and other head content here -->
</head>

<body>
    <?php
    if (!empty($errorMessage)) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
    }

    if (!empty($successMessage)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
    ?>

    <div class="container my-5">
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row md-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ADMIN_NAME" value="<?php echo $ADMIN_NAME; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ADMIN_EMAILID" value="<?php echo $ADMIN_EMAILID; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="ADMIN_PASSWORD" value="<?php echo $ADMIN_PASSWORD; ?>">
                </div>
            </div>

            <div class="row md-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Your script includes and closing body/html tags here -->
</body>

</html>