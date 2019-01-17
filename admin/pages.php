<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
    if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
        echo "<script>window.location = 'index.php';</script>";

    } else {
        $id = $_GET['pageid'];
    }
?>
<style >
.delaction{  
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px; border: 1px solid #ddd;
    background-color: #DDDDDD;
    }
.delaction a{
    font-weight: normal;
}
</style>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Updated Page</h2>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name  = mysqli_real_escape_string($db->link, $_POST['name']);
            $body    = mysqli_real_escape_string($db->link, $_POST['body']);

          if ($name == "" || $body == "" ) {
                    echo "<span class='error'>Field must be not empty !<span/>";
                } else{
                $querydetails = "UPDATE tbl_pages
                        SET
                        name = '$name',
                        body = '$body'
                        WHERE id = '$id'";
                    $updated_rows = $db->update($querydetails);
                    if ($updated_rows) {
                     echo "<span class='success'>Pages Updated Successfully.</span>";
                     } else {
                     echo "<span class='error'>Page Not Updated !</span>";
                    }
                }   
        }
        ?>
                <div class="block"> 
                <?php 
                    $query = "SELECT * FROM tbl_pages WHERE id = '$id'";
                    $pages = $db->select($query);
                    if ($pages) {
                        while ($result = $pages->fetch_assoc()) {
                      
                ?>              
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" >
                                    <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="delaction"><a onclick="return confirm('Are you sure to Delete the Page!');" href="deletepage.php?delpage=<?php echo $result['id']; ?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }  } ?>
                </div>
            </div>
        </div>

        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
 <?php include 'inc/footer.php'; ?>