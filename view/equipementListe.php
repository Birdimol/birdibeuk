<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Gestion des Equipements</h1>
    <div style='text-align:center;'><a href='index.php?ctrl=adminEquipements&action=ajouter'><input class="bouton" type='button' value='Ajouter un equipement'/></a></div>
    <br>
    <div style='text-align:center;' >Liste des equipements de type : <select id='type_equipement' onchange='maj_type_equipement();'> 
        <option value='toutes'>Toutes</option>
    <?php 
        foreach($types_equipement as $type_equipement)
        {
            echo "<option value='".$type_equipement."' >".$type_equipement."</option>";
        }                    
    ?>
    </select> <input type='checkbox' onchange='debase()' id='debase' />Equipement de base uniquement</div><br>
    <div id='nbre_equipement' style='text-align:center;'></div>
    <table class='default'>
        <tr>
            <th>Nom</th><th>P0</th><th>PA</th><th>PC</th><th>Special</th><th>Action</th>
        </tr>
        <?php 
            $max_id = 0;
            foreach($equipements as $equipement)
            {
                if($equipement->ID > $max_id)
                {
                    $max_id = $equipement->ID;
                }
                
                echo "<tr id='TR_EQUI_".$equipement->ID."'>";
                    echo "<td>".$equipement->NOM."</td>";
                    echo "<td>".$equipement->PO."</td>";
                    echo "<td>".$equipement->PA."</td>";
                    echo "<td>".$equipement->PC."</td>";
                    echo "<td>".$equipement->SPECIAL."</td><!--".$equipement->type."-->";
                    if($equipement->debase)
                    {
                        echo "<!--debase-->";
                    }
                    echo "<td> <a href='index.php?ctrl=adminEquipements&action=modifier&id=".$equipement->ID."'><img style='width:20px;height:20px;margin-bottom:5px;' src='image/pencil.png'/></a> <a href='index.php?ctrl=adminEquipements&action=supprimer&id=".$equipement->ID."'><img style='width:30px;height:30px;' src='image/delete.png'/></a></td>";
                echo "<tr>";
            }        
        ?>
    </table>	
</div>
<script>
    var max_equipement = <?php echo $max_id;?>;
    
    function maj_type_equipement()
    {        
        nbre_equipement=0;

        for(a=0;a<= max_equipement;a++)
        {
            if($('#TR_EQUI_'+a).length)
            {                
                if($("#type_equipement").val() == "toutes")
                {
                    //raf du type
                    if($('#debase').is(':checked'))
                    {
                        if(-1 != $("#TR_EQUI_"+a).html().indexOf("debase") )
                        {
                            $("#TR_EQUI_"+a).show();
                            nbre_equipement++;
                        }
                        else
                        {
                            $("#TR_EQUI_"+a).hide();
                        }
                    }
                    else
                    {
                        $("#TR_EQUI_"+a).show(); 
                        nbre_equipement++;
                    }
                }
                else
                {
                    if(-1 != $("#TR_EQUI_"+a).html().indexOf($("#type_equipement").val()) )
                    {
                        if($('#debase').is(':checked'))
                        {
                            if(-1 != $("#TR_EQUI_"+a).html().indexOf("debase") )
                            {
                                $("#TR_EQUI_"+a).show();
                                nbre_equipement++;
                            }
                            else
                            {
                                $("#TR_EQUI_"+a).hide();
                            }
                        }
                        else
                        {
                            $("#TR_EQUI_"+a).show(); 
                            nbre_equipement++;
                        }
                    }
                    else
                    {
                        $("#TR_EQUI_"+a).hide();
                    }
                }  
            }            
        }
        if(parseInt(nbre_equipement) > 1)
        {
            $("#nbre_equipement").html((nbre_equipement)+" objets");
        }
        else
        {
            $("#nbre_equipement").html((nbre_equipement)+" objet");
        }        
    }
    maj_type_equipement()
    
    function debase()
    {
        maj_type_equipement();
    }
</script>