<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 <div class="grid_10">
    <div class="box round first grid">
        <h2>Change User Password</h2>
<?php 
        $user =  $_SESSION['user_name'];

        if (isset($_POST['submit'])) {
            $old = $_POST['old_pass'];
            $new = $_POST['new_pass'];

            $sql="SELECT * FROM tbl_user WHERE user_name='$user'";
            $run = mysqli_query($conn, $sql);
            $show=mysqli_fetch_assoc($run);
            $db_old = $show['user_pass'];

            if ($old==$db_old) {
                $update_pass_sql ="UPDATE tbl_user SET user_pass='$new' WHERE user_name='$user'";
                $update_pass_sql_run=mysqli_query($conn, $update_pass_sql);
                if($update_pass_sql_run){
                    echo"<strong style='color:green;'> Password Successfully changed.</strong>";
                }else{
                    echo"<strong style='color:Red;'>Password not changed...!</strong>";
                }
            }else{
                    echo"<strong style='color:Red;'>Old Password Don't Match...!</strong>";
                }
        }

        ?>                 
        <div class="block">      
         <form action="changepassword.php" method="POST">
            <table class="form">                    
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" name="old_pass" placeholder="Enter Old Password..."  name="title" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" name="new_pass" placeholder="Enter New Password..." name="slogan" class="medium" />
                    </td>
                </tr>
                 
                
                 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
