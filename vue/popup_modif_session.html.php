<div class="login-popup">
    <div class="form-popup1" id="popupFormModif" style="<?= $c->data['display'] ?>">
        <form name=modif class="form-containermodif" action="./?controleur=session" method="POST">
            <h2>Modifier une Session</h2>
            <table name="modif">
                <tr>
                    <th colspan="6">VEUILLEZ SELECTIONNER LA SESSION QUE VOUS VOULEZ MODIFIER</th>
                </tr>
                <tr>
                    <td><B>Sélectionner</B></td>
                    <td><B>Numéro de la session</B></td>
                    <td><B>Date de la session</B></td>
                    <td><B>Heure de la session</B></td>
                    <td><B>Prix de la session</B></td>
                    <td><B>Nom de la session</B></td>
                </tr>
                <?php foreach ($c->data["liste"] = $c->modele->getSession() as $UneSession) { ?>
                    <tr>
                        <td><input value="<?php echo $UneSession->NUM_SESSION; ?>" name="session" type="radio" required></td>
                        <td><?php echo $UneSession->NUM_SESSION; ?> </td>
                        <td><?php echo $UneSession->DATE_SESSION; ?></td>
                        <td><?php echo $UneSession->HEURE_SESSION; ?></td>
                        <td><?php echo $UneSession->PRIX_SESSION; ?>€</td>
                        <td><?php echo $UneSession->NOM_SESSION; ?></td>
                    </tr>
                <?php }
                ?>
            </table>
            <input type="submit" class="open-button" name="todo" value="Afficher" onclick="" />
            <input type="button" value="Fermer" name="fermer" onclick="closeFormModif()">
        </form>
    </div>
</div>