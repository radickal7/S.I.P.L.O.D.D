<?php
require_once('../vendor/html2pdf/html2pdf.class.php');
include("../conexion/conexion.php");	 
$con=mysqli_connect($host,$user,$clave,$db);

ob_start();

$content = '
<style>
#encabezado {padding:10px 0px; border-top: 1px solid; border-bottom: 1px solid; width:100%;}
#encabezado .fila #col_1 {width: 15%}
#encabezado .fila #col_2 {text-align:center; width: 55%}
#encabezado .fila #col_3 {width: 15%}
#encabezado .fila #col_4 {width: 15%}

#encabezado .fila td img {width:50%}
#encabezado .fila #col_2 #span1{font-size: 15px;}
#encabezado .fila #col_2 #span2{font-size: 12px; color: #4d9;}

#footer {padding-top:5px 0; border-top: 2px solid #46d; width:100%;}
#footer .fila td {text-align:center; width:100%;}
#footer .fila td span {font-size: 10px; color: #000;}

#fecha {margin-top:70px; width:100%;}
#fecha tr td {text-align: right; width:100%;}

#central {margin-top:50px; width:100%;}
#central tr td {padding: 10px; text-align: justify; width:100%;}

#datos {border:1px solid; margin-left:180px; width:50%;}
#datos tr {border:1px solid;}
#datos tr td{border:1px solid;}
</style>

<page backtop="20mm" backbottom="10mm" backleft="10mm" backright="20mm">
    <page_header>
		<table id="encabezado">
            <tr class="fila">
                <td id="col_1" >
					
				</td>
                <td id="col_2">
					<span id="span1"> ALCALDIA DEL MUNICIPIO LIBERTADOR </span>
					<br>
					<span id="span1"> ESTADO MERIDA </span>
				</td>
                <td id="col_3">
				</td>
                <td id="col_4">

				</td>
            </tr>
        </table>
    </page_header>
        
    <page_footer> <!-- Define el footer de la hoja -->
		<table id="footer">
            <tr class="fila">
				<td>
					<span> <h4> Gerencia de Planificacion Presupuesto y Control de Gestion </h4> </span>
				</td>
			</tr>
        </table>
    </page_footer>
    

	<table id="central" border="1">
		<tr class="fila">
			<th style="width:20%">Nº de Documento</th>
			<th style="width:20%">Destino/Origen</th>
			<th style="width:30%">Responsable</th>
			<th style="width:15%">Tipo de Documento</th>
			<th style="width:15%">Fecha</th>
		</tr>';


$append = '';
if(isset($_POST['respo']) and $_POST['respo']!='')
{
	$responsable = explode('-',$_POST['respo']);
	$append .= ' documentos.cod_resp='.$responsable[0].' ';
}
else if(isset($_POST['tipodocu']) and $_POST['tipodocu']!='')
{
	$append .= ' tipo_doc="'.$_POST['tipodocu'].'" ';
}
else if(isset($_POST['depn']) and $_POST['depn']!='')
{
	$dependencia = explode('-',$_POST['depn']);
	$append .= ' documentos.cod_origen='.$dependencia[0].' ';
}
else if(isset($_POST['fecha_inicio']) or isset($_POST['fecha_hasta'])){
	if($_POST['fecha_inicio']!='' and $_POST['fecha_hasta']=='')
	{
		$fi = date("Y-m-d", strtotime($_POST['fecha_inicio']));
		$append .= ' fech_reg >="'.$fi.'" ';
	}
	else if($_POST['fecha_hasta']!='' and $_POST['fecha_inicio']=='')
	{
		$fh = date("Y-m-d", strtotime($_POST['fecha_hasta']));
		$append .= ' fech_reg <="'.$fh.'" ';
	}
	else if($_POST['fecha_inicio']!='' and $_POST['fecha_hasta']!='')
	{
		$fi = date("Y-m-d", strtotime($_POST['fecha_inicio']));
		$fh = date("Y-m-d", strtotime($_POST['fecha_hasta']));
		$append .= ' fech_reg >="'.$fi.'" AND fech_reg <="'.$fh.'" ';
	}
}

$sql="SELECT num_doc, documentos.cod_origen, documentos.cod_resp, 
tipo_doc, fech_reg, adju_doc, 
origen.nomb_origen as nombre_departamento, 
responsables.nomb_resp as nomb_resp, responsables.apellido_resp as apellido_resp
FROM documentos
INNER JOIN origen ON origen.cod_origen=documentos.cod_origen
INNER JOIN responsables ON responsables.cod_resp=documentos.cod_resp
";
if(strlen($append)>2){
	$sql .= ' WHERE '.$append; 
}
$sql .= ' ORDER BY fech_reg ASC;';

$busq = mysqli_query($con, $sql);

$data = '';

if($reg=mysqli_fetch_array($busq)){
	do{
		$data .= '<tr>';
			$data .= '<td style="width:20%">'.$reg['num_doc'].'</td>';
			$data .= '<td style="width:20%">'.$reg['nombre_departamento'].'</td>';
			$data .= '<td style="width:30%">'.$reg['nomb_resp'].' '.$reg['apellido_resp'].'</td>';
			$data .= '<td style="width:15%">'.$reg['tipo_doc'].'</td>';
			$data .= '<td style="width:15%">'.$reg['fech_reg'].'</td>';
 		$data .= '</tr>';
 	}while($reg=mysqli_fetch_array($busq));
}


	
$content .= $data;
$content .= '</table></page>';

echo $content;
$cont = ob_get_clean();

$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($cont);
$html2pdf->Output('reporte_pdf.pdf'); 


?>