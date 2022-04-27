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
        <script type="text/javascript" src="../js/html2canvas.min.js"></script>
        <script type="text/javascript" src="../js/jspdf.min.js"></script>
        <script type="text/javascript">
            function genPDF() {
                html2canvas(document.getElementById("description"), {
                    onrendered: function (canvas) {
                        var img = canvas.toDataURL("image/jpeg");
                        if (window.screen.availWidth < window.screen.availHeight) {
                            var doc = new jsPDF({
                                orientation: 'portrait'
                            });
                        }
                        if (window.screen.availWidth > window.screen.availHeight) {
                            var doc = new jsPDF({
                                orientation: 'landscape'
                            });
                        }
                        doc.addImage(img, 'JPEG', 20, 20);
                        doc.save('description_bien.pdf');
                    }
                });
            }
        </script>
    </head>
    <body>
        <?php
        include_once '../modeles/mesFonctionsAccesBDD.php';
        $lePdo = connexionBDD();
        $ref = $_GET['reference'];
        $unbien = getUnBiens($lePdo, $ref);
        $uneimage = getimage($lePdo, $ref)
        ?>
        <div class="content" id="description">
            <h2><?php echo ' ' . $unbien['type'] . ' T' . $unbien['nbpiece'] . ' ' . $unbien['ville']; ?></h2>
            <img src="<?php echo $uneimage['chemin']; ?>" class="img_bien" alt="Image du bien immobilier" id="img_bien">
            <h3><?php echo 'Prix : ' . $unbien['prix'] . ' €'; ?></h3>
            <p>Caractéristique du bien :</p>
            <dl>
                <dt>Superficie :</dt>
                <dd><?php echo $unbien['surface'] . ' m²'; ?></dd>
                <dt>Nombre de pièces :</dt>
                <dd><?php echo $unbien['nbpiece']; ?></dd>
            </dl>
            <h3>Description :</h3>
            <p><?php echo $unbien['description']; ?></p>
            <button onclick="genPDF();">Générer PDF</button>
        </div>


    </body>
</html>
