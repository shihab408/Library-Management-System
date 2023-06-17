<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Book Info</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_GET['edit'])){
                     $id = $_GET['edit'];
                     $view = "SELECT * FROM tbl_book WHERE book_id='$id'";
                     $viewdata = mysqli_query($conn,$view);
                     $updata = mysqli_fetch_assoc($viewdata);
                 }



                if(isset($_POST['submit'])){
                        $book_id = $_POST['book_id'];
                        $book_name = $_POST['book_name'];
                        $book_category = $_POST['category_id'];
                        $book_author = $_POST['author_id'];
                        $book_publisher = $_POST['book_publisher'];
                        $book_qty = $_POST['book_qty'];

                        $update_sql = "UPDATE tbl_book SET
                                        book_name='$book_name',
                                        book_category='$book_category',
                                        book_author='$book_author',
                                        book_publisher='$book_publisher',
                                        book_qty='$book_qty'
                                        WHERE book_id='$book_id'";

                        $book_update= mysqli_query($conn,$update_sql);
                        if($book_update){
                            $_SESSION['msg']='Successfully Updated.';
                            echo "<script>window.location.href='booklist.php';</script>";
                            }
                    }
                ?>
             <form action="bookedit.php" method="POST">
                <input type="hidden" name="book_id" value="<?php echo $updata['book_id'] ?>" />
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="book_name" value="<?php echo $updata['book_name'] ?>" class="large" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="select" name="category_id">
                                <?php 
                                $category_sql="SELECT * FROM tbl_category";
                                $category_list = mysqli_query($conn,$category_sql);
                                while($data= mysqli_fetch_assoc($category_list)){;
                                ?> 
                                <option 
                                    value="<?php echo $data['category_id'];?>"
                                    <?php 
                                        $categorydata = $data['category_id'];
                                        $category_data = $updata['book_category'];
                                        if ($categorydata==$category_data) {
                                            echo("selected");
                                        } ?>
                                    >
                                     <?php echo $data['category_name']; ?>
                                </option>
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
                                <option value="<?php echo $data['author_id']; ?>"
                                        <?php 
                                        $authordata = $data['author_id'];
                                        $author_data = $updata['book_author'];
                                        if ($authordata==$author_data) {
                                            echo("selected");
                                        } ?>
                                    ><?php echo $data['author_name']; ?></option>
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
                                <option value="<?php echo $data['publisher_id']; ?>"
                                    <?php 
                                    $publisherdata = $data['publisher_id'];
                                    $publisher_data = $updata['book_publisher'];
                                    if ($publisherdata==$publisher_data) {
                                        echo("selected");
                                    } ?>
                                    > <?php echo $data['publisher_name']; ?> </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <input type="number" name="book_qty" value="<?php echo $updata['book_qty'];?>" class="large" required />
                        </td>
                    </tr>                                       
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Update Book" />
                              <a href="http://localhost/library/booklist.php" style="background: #ddd; padding: 5px 10px 3px 10px; color:#444; font-size: 18px;">Back</a>
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
