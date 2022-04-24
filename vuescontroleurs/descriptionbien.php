<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <?php
        // put your code here
        include_once'../inc/entete.inc'
        ?>
        <link rel="stylesheet" href="../css/cssimmo.css" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../modeles/mesFonctionsAccesBDD.php';
        $lePdo = connexionBDD();
        $ref = $_GET['reference'];
        $unbien = getUnBiens($lePdo, $ref);
        $uneimage = getimage($lePdo, $ref)
        ?>
        <div class="content">
            <h2 class="title_bien"><?php echo ' ' . $unbien['type'] . ' T' . $unbien['nbpiece'] . ' ' . $unbien['ville']; ?></h2>

            <script src="../slider.js"></script>
            <div id="slider">
                <img src="<?php echo $uneimage['chemin']; ?>" class="img_bien" alt="Image du bien immobilier" id="img_bien">
            </div>
            <div class="desc" id="descri">
                <h3><?php echo 'Prix : ' . $unbien['prix'] . ' €'; ?></h3>
                <p>Caractéristique du bien :</p>
                <dl>
                    <dt>Superficie :</dt>
                    <dd><?php echo $unbien['surface'] . ' m²'; ?></dd>
                    <dt>Nombre de pièces :</dt>
                    <dd><?php echo $unbien['nbpiece']; ?></dd>
                </dl>
                <h3>Description :</h3>
                <?php echo $unbien['description']; ?>
            </div>
        </div>
        <button onclick="Convert_HTML_To_PDF();">Convert HTML to PDF</button>
        <script src="../js/html2canvas.min.js"></script>
        <script src="../js/jspdf.min.js"></script>
        <script>
            function Convert_HTML_To_PDF() {
                var elementHTML = document.getElementById('descri');

                html2canvas(elementHTML, {
                    useCORS: true,
                    onrendered: function (canvas) {
                        var pdf = new jsPDF('p', 'pt', 'letter');

                        var pageHeight = 980;
                        var pageWidth = 900;
                        for (var i = 0; i <= elementHTML.clientHeight / pageHeight; i++) {
                            var srcImg = canvas;
                            var sX = 0;
                            var sY = pageHeight * i; // start 1 pageHeight down for every new page
                            var sWidth = pageWidth;
                            var sHeight = pageHeight;
                            var dX = 0;
                            var dY = 0;
                            var dWidth = pageWidth;
                            var dHeight = pageHeight;

                            window.onePageCanvas = document.createElement("canvas");
                            onePageCanvas.setAttribute('width', pageWidth);
                            onePageCanvas.setAttribute('height', pageHeight);
                            var ctx = onePageCanvas.getContext('2d');
                            ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight);

                            var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
                            var width = onePageCanvas.width;
                            var height = onePageCanvas.clientHeight;

                            if (i > 0) // if we're on anything other than the first page, add another page
                                pdf.addPage(612, 864); // 8.5" x 12" in pts (inches*72)

                            pdf.setPage(i + 1); // now we declare that we're working on that page
                            pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width * .62), (height * .62)); // add content to the page
                        }

                        // Save the PDF
                        pdf.save('document.pdf');
                    }
                });
            }

        </script>
    </body>
</html>
