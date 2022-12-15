<?php

session_start();

session_destroy();

echo "
<script>
    alert('Anda berhasil logout');
</script>
";

header("Location:login.php");
