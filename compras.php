<?php
session_start();
include "procesoagregar.php";
include "conexion.php";

$idusuario=$_SESSION['id_usuario'];
$total=0;


$datosobservaciones=$_POST['observaciones'];

		$arreglo=$_SESSION['carrito'];
		
		$numeroventa=0;
		$re=mysqli_query($conexion,"select * from compras order by numeroventa DESC limit 1") or die(mysqli_error());	
		while (	$f=mysqli_fetch_array($re)) {
					$numeroventa=$f['numeroventa'];
					$_SESSION['id_compra']=$f['Id'];
					$Idcompra=$f['Id'];
						
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}

		$totalTmp=0;
		for($j=0; $j<count($arreglo);$j++)
			{
				$totalTmp += intval($arreglo[$j]['Precio'])*$arreglo[$j]['Cantidad'];
			}
			date_default_timezone_set('America/Argentina/Buenos_Aires');
				
			mysqli_query($conexion,"insert into compras(numeroventa,fecha,Idcliente,observaciones,Idestado,total) values(
				".$numeroventa.",
				'".date('Y-m-d H:i:s')."',
				".$idusuario.",	'$datosobservaciones',7,		
				'".$totalTmp."'
				)");


			/* sacar la primera parte del for dejando solo el insert */	
			$ultimo_id = mysqli_insert_id($conexion); 
			/*var_dump($ultimo_id);
			var_dump("insert into compras(numeroventa,fecha,Idcliente,observaciones,Idestado,total) values(
				".$numeroventa.",
				'".date('Y-m-d')."',
				".$idusuario.",	'',7,		
				'".$totalTmp."'
				)");*/

		
		for($j=0; $j<count($arreglo);$j++){
			mysqli_query($conexion,"insert into detalle_compra(	Idcompra,Idproducto,Idcolor,Idtalle,cantidad,precio_unitario,subtotal,nombre	) values(
				".$ultimo_id.",
				".$arreglo[$j]['Id'].",
				".$arreglo[$j]['IdColor'].",
				".$arreglo[$j]['IdTalle'].",
				".$arreglo[$j]['Cantidad'].",
				".$arreglo[$j]['Precio'].",   
				'".intval(($arreglo[$j]['Precio'])*$arreglo[$j]['Cantidad'])."',
				'".$arreglo[$j]['Nombre']."' 
				)");


				/*var_dump("insert into detalle_compra(	Idcompra,Idproducto,Idcolor,Idtalle,cantidad,precio_unitario,subtotal,nombre	) values(
					".$ultimo_id.",
					".$arreglo[$j]['Id'].",
					".$arreglo[$j]['IdColor'].",
					".$arreglo[$j]['IdTalle'].",
					".$arreglo[$j]['Cantidad'].",
					".$arreglo[$j]['Precio'].",   
					'".intval(($arreglo[$j]['Precio'])*$arreglo[$j]['Cantidad'])."'
					".$arreglo[$j]['Nombre'].", 
					)");
					*/
		}



		unset($_SESSION['carrito']);
		header("Location:tablacompras.php");

?>