<?php 
 g
 $query = "SELECT * FROM orders where ";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            foreach($result as $row){
                $p_name = $row['p_name'];
                $p_price = $row['p_price'];
                $p_tax = $row['p_tax'];
                $p_qty = $row['p_qty'];
                $img_upload = $row['img_upload'];
            }
        }

?>