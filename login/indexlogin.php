<?php
session_start();
include "../view/succeslogin.php";
?>
<script> alert('Welcome'. <?php echo $_SESSION['successlogin']?>)</script>
