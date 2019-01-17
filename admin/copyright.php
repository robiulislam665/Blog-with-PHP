<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $fm->validation($_POST['name']);
                $name = mysqli_real_escape_string($db->link,$name);
                if ($name == "") {
                    echo "<span class='error'>Field Not Must Be Empty !</span>";
                } else {
                    $query = "UPDATE tbl_copyright
                            SET
                            name = '$name'
                            WHERE id = '1'";

                            $updated_row = $db->update($query);
                            if ($updated_row) {
                                echo "<span class='success'>Data Updated Successfully.</span>";
                            } else {
                                echo "<span class='error'>Data Not Updated !</span>";
                            }
                }
            }
        ?>
        <div class="block copyblock"> 
            <?php 
                $query = "SELECT * FROM tbl_copyright WHERE id = '1'";
                $copyrightname = $db->select($query);
                if ($copyrightname) {
                    while ($result = $copyrightname->fetch_assoc()) {
                
            ?>
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['name']; ?>" name="name" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
