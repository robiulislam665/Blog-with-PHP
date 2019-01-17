<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php
    $db = new Database();
?>
<?php
	if (!isset($_GET['delpage']) || $_GET['delpage'] == NULL) {
		echo "<script>window.location = 'index.php.php';</script>";
	} else {
		$pageid = $_GET['delpage'];
		$delquery = "DELETE FROM tbl_pages WHERE id = '$pageid' ";
		$delpage = $db->delete($delquery);
		if ($delpage) {
			echo "<script>alert('Page Deleted Successfuly.')</script>";
			echo "<script>window.location = 'index.php'; </script>";
		} else {
			echo "<script>alert('Page Not Deleted .')</script>";
			echo "<script>window.location = 'index.php'; </script>";
		}
	}
?>