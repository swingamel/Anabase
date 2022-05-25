function openFormSessionAjout() {
    document.getElementById("popupFormAjout").style.display = "block";
    document.getElementById("background").style.filter = "blur(2px)";
    document.getElementById("popupFormAjout").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "none";
    document.getElementById("popupFormAjout").style.pointerEvents = "all";
}

function openFormSessionModif() {
    document.getElementById("popupFormModif").style.display = "block";
    document.getElementById("background").style.filter = "blur(2px)";
    document.getElementById("popupFormModif").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "none";
    document.getElementById("popupFormModif").style.pointerEvents = "all";
}

function openFormSessionDelete() {
    document.getElementById("popupFormDelete").style.display = "block";
    document.getElementById("background").style.filter = "blur(2px)";
    document.getElementById("popupFormDelete").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "none";
    document.getElementById("popupFormDelete").style.pointerEvents = "all";
}

/*function openFormSessionAfficher() {
document.getElementById("popupFormAfficher").style.display = "block";
document.getElementById("background").style.filter = "blur(2px)";
document.getElementById("popupFormAfficher").style.filter = "blur(0px)";
document.body.style.pointerEvents = "none";
document.getElementById("popupFormAfficher").style.pointerEvents = "all";
}*/

function closeFormAjout() {
    document.getElementById("popupFormAjout").style.display = "none";
    document.getElementById("background").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "all";
}

function closeFormModif() {
    document.getElementById("popupFormModif").style.display = "none";
    document.getElementById("background").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "all";
}

function closeFormDelete() {
    document.getElementById("popupFormDelete").style.display = "none";
    document.getElementById("background").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "all";
}

function closeFormAfficher() {
    document.getElementById("popupFormAfficher").style.display = "none";
    document.getElementById("background").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "all";
}

function openFormCongressiste() {
    document.getElementById("popupFormVisualiser").style.display = "block";
    document.getElementById("background").style.filter = "blur(2px)";
    document.getElementById("popupFormVisualiser").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "none";
    document.getElementById("popupFormVisualiser").style.pointerEvents = "all";
}

function closeFormVisualiser() {
    document.getElementById("popupFormVisualiser").style.display = "none";
    document.getElementById("background").style.filter = "blur(0px)";
    document.body.style.pointerEvents = "all";
}

function validinscrire() {
    document.getElementById("todo").value = "Inscrire";
    document.forms[0].submit();
}

function validSupprimer() {
    document.getElementById("todo").value = "SupprimerCongressiste";
    document.forms[0].submit();
}