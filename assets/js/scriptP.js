function confirmerSuppression() {
    return confirm("Es-tu sûr de vouloir supprimer cette propriété ?");
}
function ouvrirFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function fermerFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
