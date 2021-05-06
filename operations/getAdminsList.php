<?php
include_once("db.php");
include_once("encrypt.php");
privateSession($conn);

$getAdminListCommand = "SELECT * FROM admins";
$requestResult = $conn->query($getAdminListCommand);

if ($requestResult->num_rows > 0) {
    while ($row = $requestResult->fetch_assoc()) {
        $adminUsername = decrypt($row['username']);
        $adminName = decrypt($row['name']);
        $adminPassword = decrypt($row['password']);
        ?>
        <tr>
            <td><?php echo $adminName;?></td>
            <td><?php echo $adminUsername;?></td>
            <td><?php echo $adminPassword;?></td>
            <td>
                <span>Edit</span>
            </td>
            <td>
                <span class="text-danger">Delete</span>
            </td>
        </tr>
        <?php
    }
}else{
    ?>
    <tr>
        <td colspan="5">
            <h6>No Admins found</h6>
        </td>
    </tr>
    <?php
}