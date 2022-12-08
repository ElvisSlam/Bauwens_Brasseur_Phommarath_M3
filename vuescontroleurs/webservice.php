<?php
$br = '<br>';
$start = '<html><head></head><body><h1>Test WebService</h1>';
$end = '</body></html>';

$get = '<form action="json.php" method="get" name="login">
            <input type="submit" value="Voir tout les biens">
        </form>
        <form action="json.php" method="get" name="login">
            <input type="number" name="id">
            <input type="submit" value="Voir un bien">
        </form>
            </body>
        </html>';

$post = '<form action="json.php" method="post" name="insert">

            <label for="ref">Reference :</label>
            <input type="number" id="ref" name="ref"><br>
            
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville"><br>

            <label for="desc">Description :</label>
            <input type="text" id="desc" name="desc"><br>

            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix"><br>

            <label for="surf">Surface :</label>
            <input type="number" id="surf" name="surf"><br>
            
            <label for="nbpiece">Nombre de pièces :</label>
            <input type="number" id="nbpiece" name="nbpiece"><br>       

            <label for="jard">Avec jardin :</label><br>
            <input type="radio" id="jard" value="1" name="jardin">  <br>
            
            <label for="nojard">Sans jardin :</label><br>
            <input type="radio" id="nojard" value="0" name="jardin">  <br> 

            <label for="appart">Appartement :</label>
            <input type="radio" name="type" value="Appartement" id="appart"><br>
            
            <label for="imm">Immeuble :</label>
            <input type="radio" name="type" value="Immeuble" id="imm"><br>
            
            <label for="local">Local :</label>
            <input type="radio" name="type" value="Local" id="local"><br>
            
            <label for="mais">Maison :</label>
            <input type="radio" name="type" value="Maison" id="mais"><br>
            
            <label for="terr">Terrain :</label>
            <input type="radio" name="type" value="Terrain" id="terr"><br>

            <input type="submit" value="Ajouter un bien">
        </form>';

echo $start, $get, $br, $post, $end;

