<?php
	
	require_once('html2pdf/html2pdf.class.php');
	
    try
    {
		$content ='<p>Hello World</p>';
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		ob_end_clean();  
        $html2pdf->Output('content_report.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }