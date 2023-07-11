<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF

require('invoice.php');
$result = mysqli_query($conn,"SELECT * FROM appointment WHERE status = 'Completed'");
while($row = mysqli_fetch_assoc($result)){
	$r = $row['appointment_id'];
	$hid = $row['hairdresser_id'];
	$cid = $row['cust_id'];
	$remark = $row['remark'];
	$finalpayment = $row['final_payment'];
$st=$row['start_time'];
	$et=$row['end_time'];
	$status = $row['status'];
	//echo $st.date7("h:i:a");
	$st_h = substr($st,0,2);
	if($st_h>=12)
	{
	if($st_h>12)
	$st_h-=12;
												$st_z = " P.M.";
											}
											else{
												$st_z = " A.M.";
											}
											$st_m = substr($st,2);
											$et_h = substr($et,0,2);
											if($et_h>=12)
											{
												if($et_h>12)
													$et_h-=12;
												$et_z = " P.M.";
											}
											else{
												$et_z = " A.M.";
											}
											$et_m = substr($et,2);
											$timetotime = $st_h.":".$st_m.$st_z." - ".	$et_h.":".$et_m.$et_z;
	$date = $row['date_appointment'];
	$hairdresser = mysqli_query($conn,"SELECT * FROM hairdresser WHERE hairdresser_id = '$hid'");
	while($row = mysqli_fetch_assoc($hairdresser))
	{
		$hairdressername = $row['hairdresser_firstname']." ".$row['hairdresser_lastname'];
	}
	$q = mysqli_query($conn,"SELECT * FROM customer WHERE cust_id = '$cid'");
	while($row = mysqli_fetch_assoc($q))
	{
		$cname = $row['cust_firstname']." ".$row['cust_lastname'];
		$ccontact = $row['cust_contactnum'];
		$cemail = $row['cust_email'];
	}
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "AerySalon",
				  
                  "AerySalon\nJalan Ayer Keroh Lama\n" .
                  "Ayer Keroh 75450\n".
                  "Malacca, Malaysia" );
$pdf->addAppintmentId( "APPOINTMENT ID", $r );
//$pdf->temporaire( "Devis temporaire" );
$pdf->addClientAdresse($cname."\n".$ccontact."\n".$cemail."\n");
$pdf->addDate(  date("Y/m/d"));
$pdf->addClient($cid);
$pdf->addPageNumber("1");
$pdf->addHairdresserName($hairdressername);
$pdf->addAppointmentDate(str_replace("-","/",$date));
$pdf->addDuration($timetotime);
//$pdf->addReference("Devis ... du ....");
$cols=array( "No."    => 20,
			 "Service Type"  => 40,
             "Service Name"  => 68,
             "Estimate Fee"     => 28,
             "Estimate Duration"      => 35);
$pdf->addCols( $cols);
$cols=array( "No."    => "C",
             "Service Type"  => "C",
             "Service Name"     => "C",
             "Estimate Fee"      => "C",
             "Estimate Duration" => "C");
			 
			 
$pdf->addLineFormat( $cols);


$y    = 109;
$serv = mysqli_query($conn,"SELECT * FROM appointment_service WHERE appointment_id = '$r'");
$i=1;
while($row = mysqli_fetch_assoc($serv))
{
	$sid = $row['service_id'];
	$s1 = mysqli_query($conn,"SELECT service.*,service_type.service_type_name FROM service INNER JOIN service_type ON service.service_type_id = service_type.service_type_id  WHERE service.service_id = '$sid'");
	while($row = mysqli_fetch_assoc($s1))
	{
		$fee = $row['service_estimatefee'];
		$d = $row['service_estimateduration'];
		$sname = $row['service_name'];
		$type = $row['service_type_name'];
		
	}
	$line = array( "No."    =>$i,
		 "Service Type"  => $type,
		 "Service Name"     => $sname,
		 "Estimate Fee"      => $fee,
		 "Estimate Duration" =>  $d.' Minutes');
	$size = $pdf->addLine( $y, $line );
	$y   += $size + 2;
	$i++;
}	




$pdf->addCadreTVAs($finalpayment);
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
// $tab_tva = array( "1"       => 19.6,
                  // "2"       => 5.5);


$pdf->addRemark($remark);
ob_end_clean();
$pdf->Output("F","receiptid".$r.".pdf");
}
?>