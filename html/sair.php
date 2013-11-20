<?php
session_destroy();
session_unset();
echo "<script>top.location.href='login.html';</script>"; 
?>