<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>User Profile</h2>
        <div class="block"> 
        <h3 style="text-align: center; color: lightpink;">User Information</h3>  
            <table class="form"> 
            <?php 
                $user=$_SESSION['user_name'];
                $sql = "SELECT * FROM tbl_user WHERE user_name='$user'";
                $run_sql = mysqli_query($conn, $sql);
                $data=mysqli_fetch_assoc($run_sql);         
            ?>                                     
                <tr>
                    <td style="text-align:center;">
                        <label>Name: <?php echo $data['full_name']; ?></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                         <label>User Name: <?php echo $data['user_name']; ?></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                         <label>E-mail: <?php echo $data['user_email']; ?></label>
                    </td>
                </tr> 
                <tr>
                    <td style="text-align: center;">
                        <label>Contact: <?php echo $data['user_contact']; ?></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <label>Nid: <?php echo $data['user_nid']; ?></label>
                    </td>
                </tr>   
                <tr>
                    <td style="text-align: center;">
                        <label>Address: <?php echo $data['user_address']; ?></label>
                    </td>
                </tr>                                                             
            </table>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
