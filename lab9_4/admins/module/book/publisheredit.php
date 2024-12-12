<?php
$id = Utils::getIndex("id");
$r = $publisher->getById($id);
$ac2= "saveEdit";
$info ="Sửa publisher!";
if (Count($r)==0) //khong co -> them moi
{
	$ac2="saveAdd";
	$info ="Thêm Mới publisher";
	$r["pub_id"]="";
	$r["pub_name"]="";
}
?>
<form action="index.php?mod=book&group=pub&ac=<?php echo $ac2;?>" method="post">
<fieldset>
<legend><?php echo $info;?></legend>
<table width="50%" border="1" cellspacing="3">
  <tr>
    <td width="23%">Mã publisher</td>
    <td width="77%"><input type="text" name="pub_id" value="<?php echo $r["pub_id"];?>"></td>
  </tr>
  <tr>
    <td>Tên publisher</td>
    <td><input type="text" name="pub_name" value="<?php echo $r["pub_name"];?>"></td>
  </tr>
  <tr>
    <td colspan="2">

	<input type="Reset">
    <input type="submit" value="Thực Hiện">
	<?php
    
	?></td>
    </tr>
</table>
</fieldset>
</form>