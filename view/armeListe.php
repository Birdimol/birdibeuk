<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Gestion des Armes</h1>
    <div style='text-align:center;'><a href='index.php?ctrl=adminArmes&action=ajouter'><input class="bouton" type='button' value='Ajouter une arme'/></a></div>
    <br>
    <div style='text-align:center;' >Liste des armes de type : <select id='type_arme' onchange='maj_type_arme();'> 
        <option value='toutes'>Toutes</option>
    <?php 
        foreach($types_arme as $type_arme)
        {
            echo "<option value='".$type_arme."' >".$type_arme."</option>";
        }                    
    ?>
    </select> <input type='checkbox' onchange='debase()' id='debase' />Armes de base uniquement</div><br>
    <div id='nbre_arme' style='text-align:center;'></div>
    <table class='default'>
        <tr>
            <th>Nom</th><th>Prix</th><th>PI</th>
            <th>Rupture</th><th>Modifications</th><th>Actions</th>
        </tr>
        <?php 
            $max_id = 0;
            foreach($armes as $arme)
            {
                if($arme->ID > $max_id)
                {
                    $max_id = $arme->ID;
                }
                
                echo "<tr id='TR_ARME_".$arme->ID."'>";
                    echo "<td>".$arme->NOM."</td>";
                    echo "<td>".$arme->PRIX."</td>";
                    echo "<td>".$arme->PI."</td>";                    
                    echo "<td>".$arme->RUP."</td>";
                    echo "<td>".$arme->modif()."</td><!--".$arme->type."-->";
                    if($arme->debase)
                    {
                        echo "<!--debase-->";
                    }
                    echo "<td> <a href='index.php?ctrl=adminArmes&action=modifier&id=".$arme->ID."'><img style='width:20px;height:20px;margin-bottom:5px;' src='image/pencil.png'/></a> <a href='index.php?ctrl=adminArmes&action=supprimer&id=".$arme->ID."'><img style='width:30px;height:30px;' src='image/delete.png'/></a></td>";
                echo "<tr>";
            }        
        ?>
    </table>	
</div>
<script>
    var max_arme = <?php echo $max_id;?>;
    
    function maj_type_arme()
    {        
        nbre_arme=0;
        for(a=0;a<= max_arme;a++)
        {
            if($('#TR_ARME_'+a).length)
            {                
                if($("#type_arme").val() == "toutes")
                {
                    //raf du type
                    if($('#debase').is(':checked'))
                    {
                        if(-1 != $("#TR_ARME_"+a).html().indexOf("debase") )
                        {
                            $("#TR_ARME_"+a).show();
                            nbre_arme++;
                        }
                        else
                        {
                            $("#TR_ARME_"+a).hide();
                        }
                    }
                    else
                    {
                        $("#TR_ARME_"+a).show(); 
                        nbre_arme++;
                    }
                }
                else
                {
                    if(-1 != $("#TR_ARME_"+a).html().indexOf($("#type_arme").val()) )
                    {
                        if($('#debase').is(':checked'))
                        {
                            if(-1 != $("#TR_ARME_"+a).html().indexOf("debase") )
                            {
                                $("#TR_ARME_"+a).show();
                                nbre_arme++;
                            }
                            else
                            {
                                $("#TR_ARME_"+a).hide();
                            }
                        }
                        else
                        {
                            $("#TR_ARME_"+a).show(); 
                            nbre_arme++;
                        }
                    }
                    else
                    {
                        $("#TR_ARME_"+a).hide();
                    }
                }  
            }            
        }
        if(parseInt(nbre_arme) > 1)
        {
            $("#nbre_arme").html((nbre_arme)+" armes");
        }
        else
        {
            $("#nbre_arme").html((nbre_arme)+" arme");
        }        
    }
    maj_type_arme()
    
    function debase()
    {
        maj_type_arme();
    }
</script>