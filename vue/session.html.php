<div class="session" style="<?= $c->data['filter']?>;<?= $c->data['pointer-events'] ?>">
    <table>
        <tr>
            <th colspan="5">TABLEAU POUR CONSULTER LES SESSIONS</th>
        </tr>
        <tr>
            <td><B>Numéro de la session</B></td>
            <td><B>Date de la session</B></td>
            <td><B>Heure de la session</B></td>
            <td><B>Prix de la session</B></td>
            <td><B>Nom de la session</B></td>
        </tr>
        <?php foreach ($c->data["liste"] = $c->modele->getSession() as $UneSession) { ?>
            <tr>
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
        <button class="open-button" onclick="openFormSessionAjout()">Ajouter une Session</button>
    </div>
    </br>
    <div class="open-btn">
        <button class="open-button" onclick="openFormSessionModif()">Modifier une Session</button>
    </div>
    </br>
    <div class="open-btn">
        <button class="open-button" onclick="openFormSessionDelete()">Supprimer une Session</button>
    </div>
</div>
</div>