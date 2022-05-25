<div class="session" style="<?= $c->data['filter'] ?>;<?= $c->data['pointer-events'] ?>">
    <form action="./?controleur=inscription" method="POST" id="formI">
        <table>
            <tr>
                <th colspan="6">VEUILLEZ SELECTIONNER UNE SESSION</th>
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
                    <td><input type=radio name="NUM_SESSION" value="<?= $UneSession->NUM_SESSION ?>" required></td>
                    <td><?php echo $UneSession->NUM_SESSION; ?> </td>
                    <td><?php echo $UneSession->DATE_SESSION; ?></td>
                    <td><?php echo $UneSession->HEURE_SESSION; ?></td>
                    <td><?php echo $UneSession->PRIX_SESSION; ?>€</td>
                    <td><?php echo $UneSession->NOM_SESSION; ?></td>
                </tr>
            <?php }
            ?>
        </table>
        <div class="open-btn">
            <input type="hidden" id="todo" name="todo" value="">
            <button onclick="validinscrire()" class="open-button">Inscrire à un Congressiste à une Session </button>
        </div>
        </br>
        <div class="open-btn">
            <button onclick="validSupprimer()" class="open-button">Supprimer un Congressiste à une Session </button>
        </div>
    </form>
</div>