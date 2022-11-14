<?php
include_once '../inc/entete.inc';
require('../modeles/mesFonctionsAccesBDD.php');
$pdo = connexionBDD();
$req = recupInfo($pdo, $_SESSION['username']);

$hash = hash("sha256", json_encode($req));

?>
<script>
    var hash= <?php echo hash("sha256", json_encode($req))?>;
    function change() {
        document.getElementById("hash").value = hash;
    }
</script>

<form class="box" action="telecharger.php?path=info.json" method="post" name="login">
    <input type="submit" value="Telecharger vos données" name="submit" class="box-button">
</form>
<form class="box" onsubmit="change()" method="post" name="login">
    <input type="submit" id="hash" value="Voir le hash" name="submit" class="box-button">
</form>
<?php
include_once '../inc/piedDePage.inc';
?>
</body>

</html>