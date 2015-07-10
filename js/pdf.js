function showPDF(doc)
{
    //Cherche pas, ta gueule, c'est magique.

    if(doc == 'Guerrier')
    {
        $("#doc").attr('data',  "pdf/fiche-metier-guerrier.pdf");
    }
    else if(doc == 'magie')
    {
        $("#doc").attr('data',  "pdf/types-de-magie-naheulbeuk-jdr.pdf");
    }
    else if(doc == "Bourgeois")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-bourgeois.pdf");
    }
    else if(doc == "Ingénieur")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-ingenieur.pdf");
    }
    else if(doc == "Mage")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-mage.pdf");
    }
    else if(doc == "Marchand")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-marchand.pdf");
    }
    else if(doc == "Ménestrel")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-menestrel.pdf");
    }
    else if(doc == "Paladin")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-paladin.pdf");
    }
    else if(doc == "Pirate")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-pirate.pdf");
    }
    else if(doc == "Pretre")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-pretre.pdf");
    }
    else if(doc == "Ranger")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-ranger.pdf");
    }
    else if(doc == "Voleur")
    {
        $("#doc").attr('data',  "pdf/fiche-metier-voleur.pdf");
    }
    else if(doc == 'Humain')
    {
        $("#doc").attr('data',  "pdf/fiche-origine-humain.pdf");
    }
    else if(doc == "Demi-elfe")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-demielfe.pdf");
    }
    else if(doc == "Elfe-noir")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-elfenoir.pdf");
    }
    else if(doc == "Barbare")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-barbare.pdf");
    }
    else if(doc == "Nain")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-nain.pdf");
    }
    else if(doc == "Ogre")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-ogre.pdf");
    }
    else if(doc == "Haut-elfe")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-hautelfe.pdf");
    }
    else if(doc == "Orque")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-orque.pdf");
    }
    else if(doc == "Gobelin")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-gobelin.pdf");
    }
    else if(doc == "Gnome")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-gnomedesforets.pdf");
    }
    else if(doc == "Elfe-sylvain")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-elfesylvain.pdf");
    }
    else if(doc == "Demi-orque")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-demiorque.pdf");
    }
    else if(doc == "Hobbit")
    {

        $("#doc").attr('data',  "pdf/fiche-origine-semihomme.pdf");
    }

    $("#pdf").show();
    show = true;
}

function closePDF()
{
    $("#pdf").hide();
    show = false;
}