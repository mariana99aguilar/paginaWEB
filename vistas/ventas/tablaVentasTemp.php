<?php 

	session_start();
	//print_r($_SESSION['tablaComprasTemp']);
 ?>

 <h4 style="color:black;">Hacer venta</h4>
 <h4><strong><div id="nombreclienteVenta"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td bgcolor="brown" style="color:black;">Nombre</td>
 		<td bgcolor="brown" style="color:black;">Descripcion</td>
 		<td bgcolor="brown" style="color:black;">Precio</td>
 		<td bgcolor="brown" style="color:black;">Cantidad</td>
 		<td bgcolor="brown" style="color:black;">Quitar</td>
 	</tr>
 	<?php 
 	$total=0;//esta variable tendra el total de la compra en dinero
 	$cliente=""; //en esta se guarda el nombre del cliente
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td bgcolor="brown" style="color:black;"><?php echo $d[1] ?></td>
 		<td bgcolor="brown" style="color:black;"><?php echo $d[2] ?></td>
 		<td bgcolor="brown" style="color:black;"><?php echo $d[3] ?></td>
 		<td bgcolor="brown" style="color:black;"><?php echo 1; ?></td>
 		<td bgcolor="white" style="color:black;">
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td bgcolor="brown" style="color:black;">Total de venta: <?php echo "$".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>