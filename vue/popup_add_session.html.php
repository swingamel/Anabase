<div class="login-popup">
    <div class="form-popup" id="popupFormAjout">
        <form class="form-container" action="./?controleur=session" method="POST">
            <h2>Ajouter une Session</h2>
            </br>
            <div class="container">
                <input type="hidden" name="numsession" value="" required>

                <input type="date" name="datesession" value="" required>

                <input type="time" name="heuresession" value="" required>

                <input type="number" name="prixsession" placeholder="Saisir le prix de la session" value="" required></br>

                <input type="text" name="nomsession" placeholder="Saisir le nom de la session" value="" required></br>
            </div>

            <input type="submit" name="todo" value="Enregistrer" /><br />
            <input type="button" onclick="closeFormAjout()" value="Fermer">
        </form>
    </div>
</div>