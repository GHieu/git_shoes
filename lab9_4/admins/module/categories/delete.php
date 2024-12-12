<?php
$id = getIndex("id", " ");

$categories->delete($id);
?>
<script>
    window.location.href = "?mod=categories";
</script>