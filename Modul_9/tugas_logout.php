<?php
    session_start();
    session_destroy();
?>
<script>
    alert('anda berhasil logout');
    document.location = 'tugas_login.php';
</script>