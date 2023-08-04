<?php
// ini tempat kita untuk menampilkan dan cetak pdf

?>

<h1>Hello world</h1>

<?php
//SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF

    $content = ob_get_clean();
    require_once(dirname(__FILE__).'./html2pdf/html2pdf.class.php');
    try
    {
       $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
       $html2pdf->pdf->SetDisplayMode('fullpage');
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
       $html2pdf->Output('laporan.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>





