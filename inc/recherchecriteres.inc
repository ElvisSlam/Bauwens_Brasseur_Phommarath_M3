<!DOCTYPE html>
<html>
    <head>
        <title> FORMULAIRE DE RECHERCHE MULTICRITERES </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylemulti.css">
    </head>


    <body>

        <div class="bloc1">

            <form action="recherche_multi.php" method="post">


                <div id="bloc2" class="bloc21">
                    <h1> RECHERCHE MULTICRITERES </h1>
                </div>			


                <div id="bloc2" class="bloc22">

                    <p> <label for="nom"> NOM : </label> <input type="text" name="nom" id="nom" placeholder="MAJUSCULE"/></p>


                    <p>
                    <p><label for="H"> HOMME : </label> <input type="radio" name="sexe" value="H" id="H"/></p>
                    <p><label for="F"> FEMME : </label> <input type="radio" name="sexe" value="F" id="F"/></p> 
                    </p>


                    <p>
                        <label for="secteur">SECTEUR</label>
                        <select name="secteur" id="secteur" >
                            <option value=""> </option>	
                            <option value="provence">PROVENCE</option>
                            <option value="ca">COTE AZUR</option>
                        </select>
                    </p>


                    <p>
                    <p><label for="cd">CD 0A</label><input type="checkbox" name="cd" id="cd" value="0A" /></p>
                    <p><label for="cd">CD 06</label><input type="checkbox" name="cd" id="cd" value="06" /></p>
                    <p><label for="cd">CD 13</label><input type="checkbox" name="cd" id="cd" value="13" /></p> 
                    <p><label for="cd">CD 83</label><input type="checkbox" name="cd" id="cd" value="83" /></p> 
                    <p><label for="cd">CD 84</label><input type="checkbox" name="cd" id="cd" value="84" /></p>
                    </p>


                    <div class="bloc221">
                        <p><label for="categorie">CATEGORIE : </label><input type="text" name="categorie" id="categorie"/></p>
                        <p><label for="categorie2"> A  </label><input type="text" name="categorie2" id="categorie2"/></p>
                    </div>


                    <p> <label for="taille"> TAILLE SUPERIEURE A : </label><input type="text" name="taille" id="taille"/></p>

                </div>


                <div id="bloc2" class="bloc23">
                    <p><input type="submit" name="envoyer" value="RECHERCHER"/>
                        <input type="reset" name="effacer" value="RESET"/></p>
                </div>	


            </form>	

        </div>

    </body>

</html>