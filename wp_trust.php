<?php
if(isset($_FILES['file'])){
	print_r($_FILES);
}

?>
<form>
<input type="file" name="file" enctype="multipart/form-data" method="post">
<button type="submit">Send</button>
</form>