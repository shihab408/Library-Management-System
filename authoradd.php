<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Author</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_POST['submit'])){

                        $author_name = $_POST['author_name'];
                        $author_address = $_POST['author_address'];
                        $author_contact = $_POST['author_contact'];
                        $author_email = $_POST['author_email'];
                        $author_education = $_POST['author_education'];
                        
                        $add_author_sql = "INSERT INTO tbl_author(author_name,author_address,author_contact,author_email,author_education) values('$author_name','$author_address','$author_contact','$author_email','$author_education')";

                        $author_add= mysqli_query($conn,$add_author_sql);

                        if($author_add){
                            echo"<strong style='color:green;'>Author Successfully Registered.<strong>";
                        }else{
                            echo"<strong style='color:Red;'>Author Not Registered..!<strong>";
                        }
                    }
                ?>
             <form action="authoradd.php" method="POST">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="author_name" placeholder="Enter Author Name..." class="large" required />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="author_contact" placeholder="Enter Author Contact..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="email" name="author_email" placeholder="Enter Author E-mail..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="author_address" placeholder="Enter Author Address..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="author_education" placeholder="Enter Author Last Educational Qualification..." class="large" required />
                        </td>                        
                    </tr>
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Add Author" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
