<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Book</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_POST['submit'])){

                        $book_name = $_POST['book_name'];
                        $book_category = $_POST['category_id'];
                        $book_author = $_POST['author_id'];
                        $book_publisher = $_POST['book_publisher'];
                        $book_qty = $_POST['book_qty'];
                        
                       $book_unique_id = "Uid_".$book_category."_".$book_author."_".rand(1,500);
                    
                        
                       $sql= "INSERT INTO tbl_book(book_name,book_unique_id,book_category,book_author,book_publisher,book_qty) values('$book_name','$book_unique_id','$book_category','$book_author','$book_publisher','$book_qty')";

                        $book_add= mysqli_query($conn,$sql);

                        if($book_add){
                            echo"<strong style='color:green;'>Book Successfully Added.<strong>";
                        }else{
                            echo"<strong style='color:Red;'>Book Not Added..!<strong>";
                        }
                    }
                ?>
             <form action="bookadd.php" method="POST">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="book_name" placeholder="Enter Book Name..." class="large" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="select" name="category_id">
                                <option>Select a Category </option>
                                <?php 
                                $category_sql="SELECT * FROM tbl_category";
                                $category_list = mysqli_query($conn,$category_sql);
                                while($data= mysqli_fetch_assoc($category_list)){;
                                ?> 
                                <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select id="select" name="author_id">
                                <option>Select Author</option>
                                <?php 
                                $author_sql="SELECT * FROM tbl_author";
                                $author_list = mysqli_query($conn,$author_sql);
                                while($data= mysqli_fetch_assoc($author_list)){;
                                ?> 
                                <option value="<?php echo $data['author_id']; ?>"><?php echo $data['author_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select id="select" name="book_publisher">
                                <option>Select Publisher</option>
                                <?php 
                                $publisher_sql="SELECT * FROM tbl_publisher";
                                $publisher_list = mysqli_query($conn,$publisher_sql);
                                while($data= mysqli_fetch_assoc($publisher_list)){;
                                ?> 
                                <option value="<?php echo $data['publisher_id']; ?>"> <?php echo $data['publisher_name']; ?> </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <input type="number" name="book_qty" placeholder="Enter Book quantity..." class="large" required />
                        </td>
                    </tr>                                       
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Add Book" />
                             <input type="submit" Value="Reset" />
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
