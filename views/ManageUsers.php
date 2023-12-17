<?php
include "./includes/Header.php";
include "../models/User.php";

$userModel = new User();
$users = $userModel->getAllUsers();
?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3 class="mb-3" style="margin-top: 2%;">Manage Users</h3>
                    </center>
                    <hr>
                    <div class="mb-3">
                        <center>
                            <a href="AddUser.php" class="btn btn-success">Add new User</a>
                        </center>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <th scope="row"><?php echo $user['id']; ?></th>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['fname']; ?></td>
                                    <td><?php echo $user['lname']; ?></td>
                                    <td><?php echo $userModel->getUserRole($user['id']); ?></td>
                                    <td>
                                        <a href="./ModifyUser.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="./DeleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
