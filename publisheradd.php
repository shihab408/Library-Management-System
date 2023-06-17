<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Publisher</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_POST['submit'])){

                        $publisher_name = $_POST['publisher_name'];
                        $publisher_address = $_POST['publisher_address'];
                        $publisher_contact = $_POST['publisher_contact'];
                        $publisher_email = $_POST['publisher_email'];
                        
                        $add_publisher_sql = "INSERT INTO tbl_publisher(publisher_name,publisher_address,publisher_contact,publisher_email) values('$publisher_name','$publisher_address','$publisher_contact','$publisher_email')";

                        $publisher_add= mysqli_query($conn,$add_publisher_sql);

                        if($publisher_add){
                            echo"<strong style='color:green;'>Publisher Successfully Registered.</strong>";
                        }else{
                            echo"<strong style='color:Red;'>Publisher Not Registered..!</strong>";
                        }
                    }
                ?>
             <form action="publisheradd.php" method="POST">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="publisher_name" placeholder="Enter Publisher Name..." class="large" required />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="publisher_contact" placeholder="Enter Publisher Contact..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="email" name="publisher_email" placeholder="Enter Publisher E-mail..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="publisher_address" placeholder="Enter Publisher Address..." class="large" required />
                        </td>
                    </tr>
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Add Publisher" />
                             <input type="submit" Value="Reset" />
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
