<?php
date_default_timezone_set('UTC');
// phpinfo();
// return;
require __DIR__ . '/TCPDF-6.3.5/tcpdf.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
$pdf->AddPage( 'P', 'A4' );

$logo = __DIR__ . '/free-png-logo.png';
$reedLogo = __DIR__ . '/reed-logo.jpeg';

// Set some content to print
$html = <<<EOD
<table style="padding: 0 0 30px 0;">
    <tbody>
        <tr>
            <td><img src="{$logo}" alt="Logo" width="100"></td>
            <td style="color: #ff0000; font-size: 25px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
        </tr>
    </tbody>
</table>
<table style="padding: 0 0 30px 0;">
    <tbody>
        <tr>
            <td style="color: #ff00ff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error nisi, officiis temporibus consequuntur ratione ipsum earum dolores. Laborum saepe quibusdam alias voluptatibus, obcaecati delectus non debitis voluptates, dolorem expedita numquam.</td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="border: 2px solid #cccccc;">Lorem ipsum dolor sit amet, consectetur</td>
        <td><img src="{$reedLogo}"></td>
        <td><img style="border: 2px solid #cccccc;" src="{$reedLogo}"></td>
    </tr>
</table>
EOD;

// Print text using writeHTMLCell()
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML( $html );

// Save PDF to path
$pdf->Output(__DIR__ . '/example.pdf', 'F');

// Open PDF to browser
$pdf->Output('example.pdf', 'I');
