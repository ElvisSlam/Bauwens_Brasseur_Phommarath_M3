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
        <button onclick="enregistrerBien()">Télécharger le bien en PDF</button>
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script>
            var descrip = document.getElementById('descri');
            var descrip_img = document.getElementById('img_bien');
            var opt = {
                margin: 1,
                filename: 'description_bien.pdf',
                image: { type: 'jpeg', quality: 0.9}
            };
            
            html2pdf().set(opt).from(descrip_img).save();
        </script>
    </body>
</html>
