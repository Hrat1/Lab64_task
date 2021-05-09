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
            $productNameDec = decrypt($productName);
            $productPriceDec = decrypt($productPrice);
            $productImgDec = decrypt($productImg);

            $response .= '
					<tr id="'. $productId.'">
                        <th scope="row">
                            <span
                                class="showImg" 
                                data-mdb-toggle="modal"
                                data-mdb-target="#viewProdImgModal"
                                data-mdb-img="'. $productImgDec .'"
                                onclick="showImage(this)"
                            >'. $productId .'</span>
                        </th>
                        <td>'.$productNameDec .'</td>
                        <td>'.$productPriceDec .'</td>
                        <td>
                            <span 
                                data-mdb-toggle="modal"
                                data-mdb-target="#editProduct"
                                data-mdb-prod-name="'.$productNameDec.'"
                                data-mdb-prod-price="'.$productPriceDec.'"
                                data-mdb-prod-img="'.$productImgDec.'"
                                onclick="showEditProductModal(this)"
                            >Edit</span>
                        </td>
                        <td>
                            <span 
                                class="text-danger"
                                onclick="showDeleteProductModal(this)"
                                data-mdb-toggle="modal"
                                data-mdb-target="#deleteProductModal"
                                data-mdb-id="'. $productId .'"
                                >Delete</span>
                        </td>
                    </tr>
				';
        }

        exit($response);
    } else
        exit('reachedMax');
}


if (isset($_POST['add_prod_name']) && isset($_POST['add_prod_price']) && isset($_FILES['add_prod_img']['name'])) {
    $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
    $path = 'uploads/';
    $addFile = $_FILES['add_prod_img']['name'];
    $ext = pathinfo($addFile, PATHINFO_EXTENSION);


    if (!empty($_POST['add_prod_name']) || !empty($_POST['add_prod_price']) || $_FILES['add_prod_img']['name']) {
        if (strlen($_POST['add_prod_name']) <= 4 || strlen($_POST['add_prod_name']) > 20) {
            echo "Product name length is not valid";
        } elseif (strlen($_POST['add_prod_price']) < 1 || strlen($_POST['add_prod_price']) > 10) {
            echo "Product price length is not valid";
        } elseif (!is_numeric($_POST['add_prod_price'])) {
            echo "Product price is not numeric";
        }else if (!in_array($ext, $valid_extensions)) {
            echo 'Please Select JPG, JPEG or png file';
        }else{
            $addProductName = $_POST['add_prod_name'];
            $addProductPrice = $_POST['add_prod_price'];
            $addProductNameEnc = encrypt($addProductName);
            $addProductPriceEnc = encrypt($addProductPrice);

            $temp = explode(".", $_FILES["add_prod_img"]["name"]);
            $newFilename =  md5($addProductPriceEnc) . "_" . round(microtime(true)) . '.' . end($temp);
            $newFilenameEnc = encrypt($newFilename);

            $insertNewProdSQL = "INSERT INTO products (name, price, img) VALUES ('$addProductNameEnc', '$addProductPriceEnc', '$newFilenameEnc')";

            if (mysqli_query($conn, $insertNewProdSQL) && copy($_FILES['add_prod_img']['tmp_name'], "../../uploads/products/" . $newFilename)) {
                echo "Data Inserted";
            }else{
                echo "something is wrong";
            }
        }
    }else{
        echo "Please write valid data";
    }
}

if (isset($_POST['deleteProduct'])) {
    if (isset($_POST['productId']) && is_numeric($_POST['productId'])) {
        $productId = $_POST['productId'];

        $selectProductSQL = "SELECT * FROM products WHERE id='$productId'";
        $selectProductResult = $conn->query($selectProductSQL);

        if ($selectProductResult->num_rows > 0) {
            $row = $selectProductResult->fetch_assoc();
            $prodImagePath = decrypt($row['img']);

            $deleteProductSQL = "DELETE FROM products WHERE id='$productId'";
            $deleteProductResult = $conn->query($deleteProductSQL);

            if (unlink("../../uploads/products/" . $prodImagePath) && $deleteProductResult){
                echo "Product successfully deleted";
            }else if (!unlink("../../uploads/products/" . $prodImagePath)) {
                echo "file don't found";
            }else{
                echo "Something is wrong";
            }
        }else{
            echo "Product don't exists";
        }

    }else{
        echo "Something is wrong";
    }
}






