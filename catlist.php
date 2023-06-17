<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Category List
                <?php 
                    if (isset($_SESSION['msg'])) {
                        echo (" || ".$_SESSION['msg']);
                        unset($_SESSION['msg']);
                    }
                ?>
            </h2>
            <div class="block">        
                <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $cat_sql = "SELECT * FROM tbl_category";
                        //$cat_list=$conn->query($cat_sql);
                        $cat_list = mysqli_query($conn,$cat_sql);
                        $i=1;
                        while($data = mysqli_fetch_assoc($cat_list)){;
                    ?>                   
                    <tr class="odd gradeX">
                        <td style="text-align: center;"><?php echo $i++ ?></td>
                        <td style="text-align: left;"><?php echo $data['category_name'];?></td>
                        <td style="text-align: center;"><a href="catedit.php?edit=<?php echo $data['category_id'];?>">Edit</a> || <a href="catlist.php?delid=<?php echo $data['category_id'];?>">Delete</a></td>
                    </tr>
                    <?php }
                            if(isset($_GET['delid'])){
                             $del = $_GET['delid'];
                            
                            $cat_del_sql = "DELETE FROM tbl_category WHERE category_id=$del";

                            $delete = mysqli_query($conn, $cat_del_sql);
                            
                            if($delete){
                                echo "Category Successfully Deleted";
                                //header("refresh:http://localhost/practise/");
                            }else{echo "Category Not deleted";}
                            
                        }else{ //echo "Id not found"; 
                                }   
                        
                        ?>
                </tbody>
            </table>
           </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function () {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>   
<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
