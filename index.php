<?php
include_once "db.php";
include_once("operations/session.php");
privateSession($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="mdb/css/mdb.min.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<div class="row">
    <div class="col-12 col-sm-3 table-links-wrap">
        <div>
            <div class="nav flex-column nav-tabs text-center table-links" id="v-tabs-tab" role="tablist"
                 aria-orientation="vertical">
                <a class="nav-link active" id="v-tabs-orders-tab" data-mdb-toggle="tab" href="#v-tabs-orders" role="tab"
                   aria-controls="v-tabs-orders" aria-selected="true">Orders</a>
                <a class="nav-link" id="v-tabs-products-tab" data-mdb-toggle="tab" href="#v-tabs-products" role="tab"
                   aria-controls="v-tabs-products" aria-selected="false">Products</a>
                <a class="nav-link" id="v-tabs-admins-tab" data-mdb-toggle="tab" href="#v-tabs-admins" role="tab"
                   aria-controls="v-tabs-admins" aria-selected="false">Admins</a>
            </div>

        </div>
    </div>
    <div class="col-12 col-sm-9 table-view-wrap">
        <div class="tab-content" id="v-tabs-tabContent">
            <div class="tab-pane fade show active" id="v-tabs-orders" role="tabpanel" aria-labelledby="v-tabs-orders-tab">
                <div class="order-list-wrap pt-4">
                    <h5 class="tab-panel-title">List of orders</h5>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Order Date</th>
                                <th scope="col">Total price</th>
                                <th scope="col" colspan="2">actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>20/06/07</td>
                                <td>520</td>
                                <td>
                                    <span>Details</span>
                                </td>
                                <td>
                                    <span class="text-danger">Delete</span>
                                </td>
                            </tr>
                            <tr>
                                <td>20/02/09</td>
                                <td>400</td>
                                <td>
                                    <span>Details</span>
                                </td>
                                <td>
                                    <span class="text-danger">Delete</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-tabs-products" role="tabpanel" aria-labelledby="v-tabs-products-tab">
                <div class="product-list-wrap pt-4">
                    <h5 class="tab-panel-title">List of products</h5>
                    <p class="addButton">Add new product</p>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col" colspan="2">actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Product1</td>
                                <td>520</td>
                                <td>
                                    <span>Edit</span>
                                </td>
                                <td>
                                    <span class="text-danger">Delete</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Product2</td>
                                <td>30</td>
                                <td>
                                    <span>Edit</span>
                                </td>
                                <td>
                                    <span class="text-danger">Delete</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-tabs-admins" role="tabpanel" aria-labelledby="v-tabs-admins-tab">
                <div class="admin-list-wrap pt-4">
                    <h5 class="tab-panel-title">List of admins</h5>
                    <p class="addButton">Add new admin</p>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">username</th>
                                <th scope="col">Password</th>
                                <th scope="col" colspan="2">actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php include_once "operations/getAdminsList.php"?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="mdb/js/mdb.min.js"></script>
</body>
</html>
