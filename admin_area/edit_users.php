<?php
if(isset($_GET['edit_users'])){
    $edit_user = $_GET['edit_users'];
    $get_users = "SELECT * FROM `user_table` WHERE user_id=$edit_user";
    $result = mysqli_query($con, $get_users);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_image = $row['user_image'];
    $user_mobile = $row['user_mobile'];
    $user_address = $row['user_address'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit User</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" value="<?php echo $username?>" name="username" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="user_email" class="form-label">User Email</label>
                <input type="text" id="user_email" value="<?php echo $user_email?>" name="user_email" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="user_password" class="form-label">User Password</label>
                <input type="text" id="user_password" value="<?php echo $user_password?>" name="user_password" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="user_address" class="form-label">User Address</label>
                <input type="text" id="user_address" value="<?php echo $user_address?>" name="user_address" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="user_mobile" class="form-label">User Mobile</label>
                <input type="text" id="user_mobile" value="<?php echo $user_mobile?>" name="user_mobile" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="user_image" class="form-label">User Image</label>
                <div class="d-flex">
                    <input type="file" id="user_image" name="user_image" class="form-control w-90 m-auto">
                    <img src="./user_area/user_images/<?php echo $user_image?>" alt="" class="product_img">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" name="edit_user" value="Update User" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['edit_user'])){
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $user_mobile=$_POST['user_mobile'];
    $user_address=$_POST['user_address'];
    $user_image =$_FILES['user_image']['name'];
    $temp_image=$_FILES['user_image']['tmp_name'];
    if(!empty($_FILES['user_image']['name'])){
        $user_image=$_FILES['user_image']['name'];
        $temp_image=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($temp_image,"./user_area/user_images/$user_image");
    }
    //query to update users
    $update_user="update `user_table` set username='$username', user_email='$user_email',
    user_password='$user_password', user_image='$user_image', user_mobile='$user_mobile', user_address='$user_address' where user_id=$edit_user";
    $result_user=mysqli_query($con,$update_user);
    if($result_user){
        echo "<script>alert('User updated successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>