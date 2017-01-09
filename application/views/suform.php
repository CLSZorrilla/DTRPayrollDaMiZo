<form name="form" method="POST">
<?php
  foreach($labels as $key => $label){
  	switch($dType[$key]){
  		case "datenowd":
?>
<div class="form-group">
  <label for="<?php echo $dataName[$key]; ?>"><?php echo $label; ?></label>
  <input readonly type="text" class="form-control" name="<?php echo $dataName[$key]; ?>" id="<?php echo $dataName[$key]; ?>" placeholder="<?php echo $label; ?>" value="<?php if(isset($_POST[$dataName[$key]])){echo $_POST[$dataName[$key]];}else{echo date("m/d/Y");} ?>">
</div>

<?php	
        break;
		    case "sex":
?>
<div class="form-group">
  <label for="<?php echo $dataName[$key]; ?>">Sex</label>
  <select name="<?php echo $dataName[$key]; ?>" class="form-control" id="<?php echo $dataName[$key]; ?>">
    <option>male</option>
    <option <?php if(isset($_POST[$dataName[$key]])&&$_POST[$dataName[$key]]=='female')echo 'selected'; ?>>female</option>
  </select>
</div>

<?php	
        break;
		    default:
?>
  <div class="form-group">
    <label for="<?php echo $dataName[$key]; ?>"><?php echo $label; ?></label>
    <input type="<?php echo $dataType[$key]; ?>" class="form-control" name="<?php echo $dataName[$key]; ?>" id="<?php echo $dataName[$key]; ?>" placeholder="<?php echo $label; ?>" value="<?php if(isset($_POST[$dataName[$key]]))echo $_POST[$dataName[$key]]; ?>">
  </div>
<?php
	}
}
?>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>