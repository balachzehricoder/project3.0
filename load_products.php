<?php
    session_start();

    include 'config.php';

    $output = '';

    $query = "SELECT * FROM products";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $p_name = $row['p_name'];
            $p_price = $row['p_price'];
            $img_upload = $row['img_upload'];

            $output .= '
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card main" style="width: 18rem;">
                        <img src="' . $img_upload . '" class="card-img-top carimg" alt="...">
                        <div class="card-body">
                            <p class="card-title text">name: ' . $p_name . '</p>
                            <p class="card-text text">price: ' . $p_price . '  Rp</p>
                            <a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-danger">Add to Cart</a>
                        </div>
                    </div>
                </div>';
        }
    }

    echo $output;
?>
