<?php
session_start();
include("../controller/connection.php");
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
