<?php

$info = '<html>
            <head>
            </head>
            <body>
                <h1>Test WebService</h1>
                <form action="json.php" method="get" name="login">
                    <input type="submit" value="Voir tout les biens">
                </form>
                <form action="json.php" method="get" name="login">
                    <input type="number" name="submit">
                    <input type="submit" value="Voir un bien">
                </form>
            </body>
        </html>';

echo $info;