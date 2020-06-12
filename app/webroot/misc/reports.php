<?php
	//include('functions.php');
	$company = $_POST['company'];
	$company_code = $_POST['company_code'];
	$date = $_POST['date'];
	$auto = $_POST['auto'];
	$date_in_words = explode('-',$date);
	$auto_in_words = explode(' ',$auto);
	$driver = $_POST['driver'];
	$travel_page_writer = $_POST['travel_page_writer'];
	$get_records_from = $_POST['get_records_from'];
	$get_records_to = $_POST['get_records_to'];
	
	
	$user_id = getUserId($_SESSION['email']);
	$from_to_query = "SELECT  date, km_begin, from_location, to_location, purpose,
		km_end, km FROM distances WHERE date BETWEEN '$get_records_from' AND '$get_records_to' 
		AND auto='$auto' AND user_id='$user_id'";
	$result = mysql_query($from_to_query);
	
	$auto_name = $auto_in_words[0];
	$auto_nr = $auto_in_words[1];
	
	if($_SESSION['lang'] == 'en'){
		$day = $date_in_words[0];
		$month = $date_in_words[1];
		$year = $date_in_words[2];
	}else{
		$day = $date_in_words[2];
		$month = $date_in_words[1];
		$year = $date_in_words[0];
	}
	
	
	require('tcpdf/config/lang/eng.php');
	require('tcpdf/tcpdf.php');
	ob_end_clean();
	$pdf = new TCPDF('L', 'pt', 'A4',  true, 'UTF-8', false);
	$pdf->SetFont('dejavusans','', null, '', 'default', true );
	$pdf->SetFontSize(8);
	$pdf->AddPage();
	$pdf->Line(345, 30, 500, 30);
	$pdf->Text(30, 30, '(įmonės pavadinimas)', false, false, true, 0, 0, 'C');
	
	
	$pdf->Line(345, 60, 500, 60);
	$pdf->Text(30, 60, '(įmonės kodas)', false, false, true, 0, 0, 'C');
	
	$pdf->SetFontSize(12);
	$pdf->Text(30, 15, $company, false, false, true, 0, 0, 'C');
	$pdf->Text(30, 45, $company_code, false, false, true, 0, 0, 'C');
	
	
	
	
	$pdf->SetFontSize(9);
	
	$tbl = '
	<br><br><br><br>
	<table>
		<tr>
			<td style="width: 700px;">
			</td>
			<td style="width: 120px;">
				<table align="right">
				<tr>
					<td style=" width: 95px; height: 40px;  text-align:center"><b>Degalų suvartojimas litrais</b></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">Likutis laikotarpio pradžioje</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Kelionės metu pilta degalų</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Likutis laikotarpio pabaigoje</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Faktinis suvartojimas</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Suvartojimas pagal vadovo patvirtintą normą</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Ekonomija</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
					Pereikvojimas</td>	
				</tr>
				<tr>
					<td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
				</tr>

				</table>
				
			</td>
		</tr>
		
	</table>
	';
	$pdf->writeHTML($tbl, true, false, false, false, 'R');
	
	$pdf->SetFontSize(12);
	
	
	$pdf->Text(0, 120, 'LENGVOJO AUTOMOBILIO KELIONĖS LAPAS', false, false, true, 0, 0, 'C');
	$pdf->Line(285, 155, 325, 155);
	$pdf->Text(287, 140, $year, false, false, true, 0, 0, 'L');
	$pdf->Text(380, 140, $month, false, false, true, 0, 0, 'L');
	$pdf->Text(180, 178, $auto_name, false, false, true, 0, 0, 'L');
	$pdf->Text(180, 198, $auto_nr, false, false, true, 0, 0, 'L');
	$pdf->Text(140, 218, $driver, false, false, true, 0, 0, 'L');
	$pdf->Text(450, 205, $travel_page_writer, false, false, true, 0, 0, 'L');
	
	
	$pdf->SetFontSize(10);
	
	$pdf->Text(330, 145, 'm.', false, false, true, 0, 0);
	$pdf->Line(355, 155, 415, 155);
	$pdf->Text(420, 145, 'mėn. Nr.', false, false, true, 0, 0);
	$pdf->Line(470, 155, 530, 155);
	$pdf->Text(30, 180, 'Automobilis:', false, false, true, 0, 0);
	$pdf->Line(140, 193, 300, 193);
	$pdf->Text(30, 200, 'Valstybinis numeris:', false, false, true, 0, 0);
	$pdf->Line(140, 213, 300, 213);
	$pdf->Text(30, 220, 'Vairuotojas:', false, false, true, 0, 0);
	$pdf->Line(140, 233, 300, 233);
	$pdf->SetFontSize(8);
	$pdf->Text(190, 233, '(Vardas, pavardė)', false, false, true, 0, 0);
	$pdf->SetFontSize(10);
	$pdf->Text(330, 210, 'Kelionės lapą išrašė:', false, false, true, 0, 0);
	$pdf->Line(445, 220, 650, 220);
	
	$pdf->SetFontSize(9);
	$tbl1 = '
	<br><br><br><br><br>
	<table>
    <tr>
        <td style="border: 1px solid #000000; width: 30px; height: 40px; text-align:center;">Eil. Nr.</td>
        <td style="border: 1px solid #000000; width: 60px; text-align:center">Data</td>
        <td style="border: 1px solid #000000; width: 100px; text-align:center">Skaitiklio parodymai
			kelionės pradžioje (km)</td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center">Išvykimo vieta</td>
		<td style="border: 1px solid #000000; width: 90px; text-align:center">Paskyrimo vieta</td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center">Važiavimo tikslas</td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center">Skaitiklio parodymai
			kelionės pabaigoje (km)</td>
		<td style="border: 1px solid #000000; width: 50px; text-align:center">Tikrinusio parašas</td>
		<td style="border: 1px solid #000000; width: 55px; text-align:center">Nuvažiuota (km)</td>		
    </tr>
	</table>';
	$pdf->writeHTML($tbl1, false, false, false, false, '');
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	
		//$pdf->Text(140, 150, $row["date"], false, false, true, 0, 0, 'L');
	//				printf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>
	//				<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>" , $row["auto"], $row["date"], $row["project"], $row["km_begin"], $row["km_end"]
	//				, $row["from_location"], $row["to_location"], $row["purpose"], $row["km"]);
					
	$tbl2.='<table><tr>
        <td style="border: 1px solid #000000; width: 30px; text-align:center;"></td>
        <td style="border: 1px solid #000000; width: 60px; text-align:center"></td>
        <td style="border: 1px solid #000000; width: 100px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 90px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 100px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 50px; text-align:center"></td>
		<td style="border: 1px solid #000000; width: 55px; text-align:center"></td>
		
    </tr>
	</table>
	';
		
	}
				
	
	mysql_free_result($result);
	$pdf->writeHTML($tbl2, false, false, false, false, '');
	$tbl3='
	<table>
		<tr>
			<td style="width: 580px;">
			</td>
			<td style="width: 50px; text-align: right;">
				Iš viso &nbsp; (km) &nbsp;
			</td>
			<td style="border: 1px solid #000000; width: 55px; text-align:center"></td>
		</tr>
	</table>
	<br>
	<table >
		<tr>
			<td style="width: 400px;"><span>Kelionės lapą patikrino</span></td>
		</tr>
		<tr style="font-size: 8px; height=10px;">
			<td style="width: 150px;"></td>
			<td style="font-size: 8px; height=10px;"><hr style="width: 440px; height=10px;"></td>
		</tr>
		<tr style="font-size: 8px; height=10px;">
			<td style="width: 285px; height=10px;"></td>
			<td style="font-size: 8px; height=10px;"><span style="font-size: 8px; height=10px;" >(Pareigos, parašas, vardas, pavardė, data)</span></td>
		</tr>
	</table>
	';
	
	

	
	$pdf->writeHTML($tbl3, false, false, false, false, '');
	
	$result = mysql_query($from_to_query);
	$height = 295;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$pdf->Text(60, $height, $row["date"], false, false, true, 0, 0, 'L');
		$height += 12;
	}

	$pdf->Output('gas_report.pdf', 'I');
	
	
?>