<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php
    $db = new Database();
    $fm = new Format();
?>
<?php
	if (!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL) {
		echo "<script>window.location = 'postlist.php';</script>";
	} else {
		$postid = $_GET['delpostid'];

		$query = "SELECT * FROM tbl_post WHERE id ='$postid'";
		$getId = $db->select($query);
		if ($getId) {
			while ($result = $getId->fetch_assoc()) {
				$delimage = $result['image'];
				unlink($delimage);
			}
		}
		$delquery = "DELETE FROM tbl_post WHERE id = '$postid' ";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Data Deleted Successfuly.')</script>";
			echo "<script>window.location = 'postlist.php'; </script>";
		} else {
			echo "<script>alert('Data Not Deleted .')</script>";
			echo "<script>window.location = 'postlist.php'; </script>";
		}
	}
?>