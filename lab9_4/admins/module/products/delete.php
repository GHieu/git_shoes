<?php
$id = getIndex("id", " ");

$products->Remove($id);
?>
<script>
    window.location.href = "?mod=products";
</script>