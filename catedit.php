<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php"); 


        if(isset($_GET['edit'])){
             $id = $_GET['edit'];
             //echo $id;
             $view = "select * from tbl_category where category_id=$id";
             $viewdata = mysqli_query($conn,$view);
             $data = mysqli_fetch_assoc($viewdata);
             //print_r($data['name']);
         }

        //update 
        if(isset($_POST['submit'])){
            $category_id = $_POST['category_id'];
            $category_name = $_POST['category_name'];
            
            echo $usql = "UPDATE tbl_category SET 
                category_name='$category_name' 
                WHERE category_id='$category_id'";

            $update = mysqli_query($conn,$usql);

            if($update){
                $_SESSION['msg']='Successfully Updated.';
            echo "<script>window.location.href='catlist.php';</script>";
            }
        }
?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Category </h2>
           <div class="block copyblock"> 
             <form action="catedit.php" method="POST" >
                <table class="form">
                 <input type="hidden" name="category_id" value="<?php echo $data['category_id'];?>"/>					
                    <tr>
                        <td>
                            <input type="text" name="category_name" value="<?php echo $data['category_name'];?>" class="large"  />
                        </td>
                    </tr>                      
    				<tr> 
                        <td>
                            <input id="success" type="submit" name="submit" Value="Update Category"/>

                             <a href="http://localhost/library/catlist.php" style="background: #ddd; padding: 5px 10px 3px 10px; color:#444; font-size: 18px;">Back</a>
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
