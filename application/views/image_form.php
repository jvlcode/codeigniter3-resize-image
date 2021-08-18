<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.main {
  text-align: center;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


<div class="main">
	<h3 >Image Resize</h3>
	<form method="POST" enctype="multipart/form-data" action="<?=base_url('image/upload')?>">
		<label for="fname">Image</label>
		<input type="file" name="image" placeholder="Choose image...">
		<input type="submit" value="Submit">
	</form>
</div>
<?php if(isset($original_img)&&isset($resized_img)):  ?>
<div style="position: relative;">
	<div style="  position:absolute;left:auto">
		<h3>Original :</h3>
		<img src="<?=base_url($original_img)?>" >
	</div>
	<div style="position:absolute;left:600px;">
		<h3>Resized :</h3>
		<img src="<?=base_url($resized_img)?>" >
	</div>
</div>
<?php endif;?>

</body>
</html>
