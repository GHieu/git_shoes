<div class="itemmenu"><a href="index.php">Home</a></div>
<div class="itemmenu"><a href="#">Tin tức</a></div>
<div class="itemmenu"><a href="#">Sản phẩm</a></div>
<div class="itemmenu">
    <a href="index.php?mod=cart">
        Giỏ hàng (<span id="cart_summary"><?php echo isset($cart) ? $cart->getNumItem() : 0; ?></span>)
    </a>
</div>
<div class="itemmenusearch">
    <form action="index.php" method="get">
        <input type="hidden" name="mod" value="book" />
        <input type="hidden" name="ac" value="search" />
        <input type="text" name="key" placeholder="Nhập từ khóa tìm kiếm"
            value="<?php echo htmlspecialchars(Utils::getIndex('key', ''), ENT_QUOTES); ?>" />
        <input type="submit" value="Search" />
    </form>
</div>