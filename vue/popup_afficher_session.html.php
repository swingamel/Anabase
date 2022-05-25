<div class="login-popup">
    <div class="form-popup3" id="popupFormAfficher" style="<?= $c->data['display'] ?>">
        <form class="form-container" action="./?controleur=session" method="POST">
            <h2>Modifier une Session</h2>
            </br>
            <div class="container">
                <input type="hidden" name="numsession" value="<?php if (isset($c->data["afficher"])) {
                                                                    echo $c->data["afficher"]['NUM_SESSION'];
                                                                } else { ?> <?php } ?>">

                <input type="date" name="datesession" value="<?php if (isset($c->data["afficher"])) {
                                                                    echo $c->data["afficher"]['DATE_SESSION'];
                                                                } else { ?> <?php } ?>"></br>

                <input type="time" name="heuresession" value="<?php if (isset($c->data["afficher"])) {
                                                                    echo $c->data["afficher"]['HEURE_SESSION'];
                                                                } else { ?> <?php } ?>"></br>

                <input type="number" name="prixsession" placeholder="Saisir le prix de la session" value="<?php if (isset($c->data["afficher"])) {
                                                                                                                echo $c->data["afficher"]['PRIX_SESSION'];
                                                                                                            } else { ?> <?php } ?>"></br>

                <input type="text" name="nomsession" placeholder="Saisir le nom de la session" value="<?php if (isset($c->data["afficher"])) {
                                                                                                            echo $c->data["afficher"]['NOM_SESSION'];
                                                                                                        } else { ?> <?php } ?>"></br>
            </div>

            <input type="submit" class="btn" name="todo" value="Modifier" /><br /><br /><br />
            <div id="fermer">
                <a href="./?controleur=session">Fermer</a>
            </div>
        </form>
    </div>
</div>
