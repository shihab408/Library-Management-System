<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Category</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_POST['submit'])){

                        $category_name = $_POST['category_name'];
                        
                        $add_cat_sql = "INSERT INTO tbl_category(category_name) values('$category_name')";

                        $cat_add= mysqli_query($conn,$add_cat_sql);

                        if($cat_add){
                            echo"<strong style='color:green;'>Category Successfully Inserted<strong>";
                        }else{
                            echo"<strong style='color:Red;'>Category Not Inserted<strong>";
                        }
                    }
                ?>
             <form action="catadd.php" method="POST">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="category_name" placeholder="Enter Category Name..." class="large" required />
                        </td>
                    </tr>
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
