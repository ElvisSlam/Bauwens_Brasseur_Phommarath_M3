<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
?>

<script>
    function PopupImage(img) {
        w = open("", 'image', 'width=400,height=400,toolbar=no,scrollbars=yes,resizable=yes');
        w.document.write("<HTML><HEAD><TITLE></TITLE></HEAD>");
        w.document.write("<SCRIPT language=javascript>function checksize() { if (document.images[0].complete) { window.resizeTo(document.images[0].width+12,document.images[0].height+30); window.focus();} else { setTimeout('check()',250) } }</" + "SCRIPT>");
        w.document.write("<BODY onload='checksize()' leftMargin=0 topMargin=0 marginwidth=0 marginheight=0><IMG src='" + img + "' border=0>");
        w.document.write("");
        w.document.write("</BODY></HTML>");
        w.document.close();
    }
</script>
<form class="box" action="inscription.php" method="post" name="inscription">
    <h1 class="box-title">Inscription</h1>
    <input type="text" class="box-input" name="nom" placeholder="Nom">
    <input type="text" class="box-input" name="prenom" placeholder="Prenom">
    <input type="text" class="box-input" name="email" placeholder="Adresse email">
    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
    <input type="password" class="box-input" name="repeatpassword" placeholder="Confirmer mot de passe">
    Vous avez lu et accepter le réglement sur la protection de vos données</a>
    <input type="checkbox" onClick='PopupImage("../images/rgpd.png")' id="donnees" name="donnees" values="on">
    <br><br>
    <input type="submit" value="S'inscrire" name="submit" class="box-button">

</form>
<?php

?>
</body>

</html>