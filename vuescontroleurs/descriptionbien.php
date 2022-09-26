<?php
include_once'../inc/entete.inc'
?>
<script src="../js/html2canvas.min.js"></script>
<script src="../js/jspdf.min.js"></script>
<script>
    function genPDF() {
        html2canvas(document.getElementById("description"), {
            onrendered: function (canvas) {
                var img = canvas.toDataURL("image/jpeg");
                var doc = new jsPDF({
                    orientation: 'portrait'
                });
                const pageWidth = document.width;
                const pageHeight = document.height;

                const widthRatio = pageWidth / canvas.width;
                const heightRatio = pageHeight / canvas.height;
                const ratio = widthRatio > heightRatio ? heightRatio : widthRatio;

                const canvasWidth = canvas.width * ratio;
                const canvasHeight = canvas.height * ratio;
                doc.addImage(img, 'JPEG', 0, 0, canvasWidth, canvasHeight);
                doc.save('description_bien.pdf');
            }
        });
    }
</script>
<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
$ref = $_GET['reference'];
$unbien = getUnBiens($lePdo, $ref);
$uneimage = getimage($lePdo, $ref)
?>
<div class="descri" id="description">
    <h2><?php echo ' ' . $unbien['type'] . ' T' . $unbien['nbpiece'] . ' ' . $unbien['ville']; ?></h2>
    <?php
    include_once '../inc/carousel.inc';
    ?>
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
</div>
<button onclick="genPDF();">Générer PDF</button>
<?php
//include_once '../inc/piedDePage.inc';
?>
</body>
</html>
