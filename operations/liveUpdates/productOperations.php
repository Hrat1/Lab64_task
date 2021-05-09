<?php
include_once("../../db.php");
include_once("../encrypt.php");

if (isset($_POST['getProdData'])) {

    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['limit']);

    $sql = $conn->query("SELECT * FROM products LIMIT $start, $limit");
    if ($sql->num_rows > 0) {
        $response = "";

        while($data = $sql->fetch_array()) {
            $productId = $data['id'];
            $productName = $data['name'];
            $productPrice = $data['price'];
            $productImg = $data['img'];

            $response .= '
					<tr>
                        <th scope="row">'.$productId.'</th>
                        <td>'.$productName .'</td>
                        <td>'.$productPrice.'</td>
                        <td>
                            <span>Edit</span>
                        </td>
                        <td>
                            <span class="text-danger">Delete</span>
                        </td>
                    </tr>
				';
        }

        exit($response);
    } else
        exit('reachedMax');
}





