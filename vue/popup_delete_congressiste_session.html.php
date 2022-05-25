<div class="login-popup">
    <div class="form-popup4" id="popupFormSuppression" style="<?= $c->data['displaysup'] ?>">
        <form name="supCongressiste" class="form-container" action="./?controleur=inscription" method="POST">
            <input type="hidden" name="NUM_SESSION" value="<?= $c->post["NUM_SESSION"] ?>">
            <h2>Supprimer un congressiste a une Session</h2>
            </br>
            <div class="container">
                <h1>Vous avez sélectionné la Session n°<?php echo $c->post["NUM_SESSION"] ?></h1>
                <table name="supCongressiste">
                    <tr>
                        <th colspan="2">VEUILLEZ SELECTIONNER UN CONGRESSISTE</th>
                    </tr>
                    <tr>
                        <td><B>Nom du comgressiste</B></td>
                        <td><B>Sélectionner un congressiste</B></td>
                    </tr>
                    <?php
                    ?>
                    <?php foreach ($c->data["congressiste"] = $c->modele->getSessionListeCongressiste2($c->post["NUM_SESSION"]) as $UnCongressiste) { ?>
                        <tr>
                            <td><?php echo $UnCongressiste->PRENOM_CONGRESSISTE; ?> <?php echo $UnCongressiste->NOM_CONGRESSISTE; ?> </td>
                            <td><input name="NUM_CONGRESSISTE[]" value="<?= $UnCongressiste->NUM_CONGRESSISTE ?>" type="checkbox"></td>

                        </tr>
                    <?php }
                    ?>
                </table>
                <?php
                ?>
            </div>
            </br></br>
            <input type="submit" name="todo" value="Suppression" /><br />
            </br>
            <div id="fermer">
                <a href="./?controleur=inscription">Fermer</a>
            </div>
        </form>
    </div>
</div>