<?php
	include('../connect.php');
	$res=$_GET['restaurante'];
	$result = $db->prepare("SELECT * FROM restaurante WHERE restaurante = :restaurante");
	$result->bindParam(':restaurante', $res);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Editar Producto</h4></center>
<hr>
<div res="ac">
<input type="hidden" name="memi" value="<?php echo $res; ?>" />
<span>restaurante: </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['restaurante']; ?>" Required/><br>
<span>domicilio: </span><input type="text" style="width:265px; height:30px;"  name="gen" value="<?php echo $row['domicilio']; ?>" /><br>
<span>cuidad: </span><textarea style="width:265px; height:50px;" name="name" ><?php echo $row['cuidad']; ?> </textarea><br>
<span>cp: </span><input type	="date" style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['cp']; ?>" /><br>
<span>telefono : </span><input type	="date" style="width:265px; height:30px;" name="exdate" value="<?php echo $row['telefono']; ?>" /><br>
<span>rfc: </span><input type="text" style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['rfc']; ?>" onkeyup="sum();" Required/><br>
<span>folio : </span><input type="text" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['folio']; ?>" onkeyup="sum();" Required/><br>


	<?php
	$results = $db->prepare("SELECT * FROM restaurante");
		$results->bindParam(':restaurante', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Cantidad Restante: </span><input type="number" style="width:265px; height:30px;" min="0" name="qty" value="<?php echo $row['qty']; ?>" /><br>
<span>Cantidad : </span><input type="number" style="width:265px; height:30px;" min="0" name="sold" value="<?php echo $row['qty_sold']; ?>" /><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar Cambios</button>
</div>
</div>
</form>
<?php
}
?>