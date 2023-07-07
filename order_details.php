<?php
include 'config.php';

$id = $_GET["id"];

$query = "SELECT * FROM order_details WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>order_id</th>
                <th>product_id</th>
                <th>price</th>
                <th>qty</th>
                <th>View Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    echo "No results found";
}

$stmt->close();
$conn->close();
?>
