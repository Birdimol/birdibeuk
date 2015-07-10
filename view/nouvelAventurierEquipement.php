<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Choix de l'équipement.</h1>

    <style>
        select
        {
            font-size: 20px;
        }
    </style>
    <?php 
        $aventurier->printAsTable();
    ?>
    <div style='text-align:center;' ><a style='color:blue;' href='view/ficheDePerso.php'>Voir la fiche de personnage</a></div>
    <br><br>
    <form method='post' action='index.php?ctrl=nouvelAventurier&etape=7'>    
        <div>
            Vous allez à présent choisir votre équipement, vous disposez pour cela du triple de votre fortune de départ, soit 
            <?php echo $aventurier->OR*3; ?> pièces d'or.<br>
            <br>
            <div style='text-align:center;'><div style='font-size:24px;'>Il vous reste <b><span id='porestantes'><?php echo $aventurier->OR*3; ?></b></span> pièces d'or.</div>        
                <table style='margin:auto;'>
                    <tr>
                        <td >
                            Vos armes :
                            <style>
                                th
                                {
                                    border-bottom:1px #900000 solid;
                                }
                            </style>
                            <div style='width:800px;height:150px;overflow:auto;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                            <table id='armes' style='width:100%;'>
                                <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PI</th><th>RUP</th><th>MODIF</th><th></th></tr>
                            </table>
                            </div>
                        </td>                
                    </tr>
                </table>
                <table style='margin:auto;'>
                    <tr>
                        <td >
                            Vos protections :
                            <div style='width:800px;height:150px;overflow:auto;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                                <table id='protections' style='width:100%;'>
                                    <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PR</th><th>RUP</th><th>MODIF</th><th></th></tr>
                                </table>
                            </div>
                        </td>                
                    </tr>
                </table>
                <table style='margin:auto;'>
                    <tr>
                        <td style='vertical-align:top;'>
                            Votre équipement :<br>
                            <div style='width:600px;height:150px;overflow:auto;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                                <table id='equipements' style='width:100%;'>
                                    <tr><th>Nombre</th><th>Nom</th><th>Prix</th></tr>
                                    
                                </table>   
                            </div>
                        </td>
                    </tr>
                </table>
                <input type='button' value='Choisir ses armes' onclick='choix_arme()' class='bouton' />
                <input type='button' value='Choisir ses protections' onclick='choix_protection()' class='bouton' />
                <input type='button' value='Choisir son equipement' onclick='choix_equipement()' class='bouton' />
                <table id='table_arme' style='display:none;margin:auto;'>
                    <tr>
                    <td style='vertical-align:top;'>                   
                        
                        <div style='text-align:center;'> S'équiper d'une arme de type : <select class='normal' id='type_arme' onchange='maj_type_arme();'> 
                        <?php 
                            foreach($types_arme as $type_arme)
                            {
                                echo "<option value='".$type_arme."' >".$type_arme."</option>";
                            }                    
                        ?>
                        </select>
                        </div>
                        <div style='margin-top:5px;overflow:auto; height:100px;width:800px;border: 1px #900000 solid;background-image:url("image/bg3.png");'>
                            <table style='width:100%;'>
                                <tr><th>Nom</th><th>Type</th><th>PO</th><th>PI</th><th>RUP</th><th>MODIF</th><th></th></tr>
                                <?php 
                                    $max_id = 0;                                
                                    foreach($armes as $arme)
                                    {
                                        if($arme->ID > $max_id)
                                        {
                                            $max_id = $arme->ID;
                                        }
                                        echo "<tr id='TR_ARME_".$arme->ID."'><td>".$arme->NOM."</td><td>".$arme->type."</td><td>".$arme->PRIX."</td><td>".$arme->PI."</td><td>".$arme->RUP."</td><td>".$arme->modif()."</td><!--".$arme->type."--><td>
                                        <input type='button' value='choisir' onclick='ajout_arme(".$arme->ID.",\"".str_replace("'","\\'",str_replace('"',"\\'",$arme->NOM))."\",\"".$arme->type."\",\"".$arme->PRIX."\",\"".$arme->PI."\",\"".$arme->RUP."\",\"".$arme->modif()."\");'/></td></tr>";
                                    }
                                ?>
                                <script>var max_arme = <?php echo $max_id;?>;</script>
                            </table>
                        </div>
                    </td>
                </tr>
                </table>
               
                <table id='table_protection' style='display:none;margin:auto;'>
                    <tr>
                        <td style='vertical-align:top;'>
                            Liste des protections de type : <select id='type_protection' onchange='maj_type_protection();'> 
                            <?php 
                                foreach($types_protection as $type_protection)
                                {
                                    echo "<option value='".$type_protection."' >".$type_protection."</option>";
                                }                    
                            ?>
                            </select><br><br>
                            <table style='width:700px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                                <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PR</th><th>RUP</th><th>MODIF</th><th></th></tr>
                            <?php 
                                $max_id = 0;
                                foreach($protections as $protection)
                                {
                                    if($protection->ID > $max_id)
                                    {
                                        $max_id = $protection->ID;
                                    }
                                    echo "<tr id='TR_PROT_".$protection->ID."'>
                                        <td>".$protection->NOM."</td>
                                        <td>".$protection->TYPE."</td>
                                        <td>".$protection->PRIX."</td>
                                        <td>".$protection->PR."</td>
                                        <td>".$protection->RUP."</td>
                                        <td style='font-size:12px;'>".$protection->modif()."</td>
                                        <!--".$protection->TYPE."-->
                                        <td><input type='button' value='choisir' onclick='ajout_protection(".$protection->ID.", \"".str_replace('"',"\\\"",$protection->NOM)."\",\"".$protection->TYPE."\",\"".$protection->PRIX."\",\"".$protection->PR."\",\"".$protection->RUP."\",\"".$protection->modif()."\");'/></td></tr>";
                                }                        
                            ?>
                            <script>var max_protection = <?php echo $max_id;?>;</script>
                            </table>   
                        </td>                
                    </tr>
                </table>
                <table id='table_equipement' style='display:none;margin:auto;'>
                    <tr>
                        <td style='vertical-align:top;'>
                            Liste de l'équipement de type : <select id='type_equipement' onchange='maj_type_equipement();'> 
                            <?php 
                                foreach($types_equipement as $type_equipement)
                                {
                                    echo "<option value='".$type_equipement."' >".$type_equipement."</option>";
                                }                    
                            ?>
                            </select><br><br>
                            <table style='width:500px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                                <tr><th>Nom</th><th>Prix</th></tr>
                                <?php 
                                    $max_id = 0;                                
                                    foreach($equipements as $equipement)
                                    {
                                        if($equipement->ID > $max_id)
                                        {
                                            $max_id = $equipement->ID;
                                        }
                                        echo "<tr id='TR_EQUI_".$equipement->ID."'><td>".$equipement->NOM."</td><td>".$equipement->PO.".".$equipement->PA."</td><!--".$equipement->type."--><td>
                                        <input type='button' value='choisir' onclick='ajout_equi(".$equipement->ID.",\"".str_replace('"',"'",$equipement->NOM)."\",\"".$equipement->PO.".".$equipement->PA."\");'/></td></tr>";
                                    }
                                ?>
                                <script>var max_equipement = <?php echo $max_id;?>;</script>
                            </table>   
                        </td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div style='text-align:center;'><input type='submit' value='Créer cet aventurier'></div>
        </div>       
    </form>
</div>
<script>    
    function choix_arme()
    {
        $("#table_arme").show();
        $("#table_protection").hide();
        $("#table_equipement").hide();
    }
    
    function choix_protection()
    {
        $("#table_arme").hide();
        $("#table_protection").show();
        $("#table_equipement").hide();
    }
    
    function choix_equipement()
    {
        $("#table_arme").hide();
        $("#table_protection").hide();
        $("#table_equipement").show();
    }

    var id = 0;
    <?php 
        if($aventurier->METIER == "Mage")
        {
            echo "ajout_equi(,'Grimoire des Ordres Néfastes niveau 1',5);\n";
            echo "ajout_equi(,'Grimoire des Ordres Néfastes niveau 2',10);";
        }
    ?>
    function ajout_equi(id_equi,nom,prix)
    {        
        po = parseFloat($('#porestantes').html());
        
        if(po >= parseFloat(prix))
        {
            id++;
            if($('#NbrEqui'+id_equi).length > 0)
            {
                //la ligne existe déjà
                $('#NbrEqui'+id_equi).html(parseInt(parseInt($('#NbrEqui'+id_equi).html()) + 1.0));
                $('#HidNbrEqui'+id_equi).val(parseInt( $('#NbrEqui'+id_equi).html()));
            }
            else
            {
                //on ajoute la ligne
                $('#equipements').append('<tr id=\'ligne'+id+'\'><td id=\'NbrEqui'+id_equi+'\' name=\'NbrEqui'+id_equi+'\'>1</td><td><input type=\'hidden\' name=\'HidNbrEqui'+id_equi+'\' id=\'HidNbrEqui'+id_equi+'\' value=\'1\'/><input type=\'hidden\' name=\'Equi'+id+'\' id=\'Equi'+id_equi+'\' value=\''+id_equi+'\'/>'+nom+'</td><td>'+prix+'</td><td><input type=\'button\' value=\'Retirer\' onclick="retirer_equipement(\'ligne'+id+'\','+id_equi+','+prix+');" /></td></tr>');            
            }
            po = po - parseFloat(prix);
            po = Math.round(po*10)/10;
            $('#porestantes').html(po);
        }
        else
        {
            alert('Vous n\'avez plus assez d\'argent.');
        }        
    }
        
    function ajout_arme(id_arme,nom,type_,prix,pi,rup,modif)
    {        
        po = parseFloat($('#porestantes').html());
        if(po >= parseFloat(prix))
        {
            id++;
            $('#armes').append('<tr id=\'ligne'+id+'\'></tr>');
                $('#ligne'+id).append('<td><input type=\'hidden\' name=\'Arme'+id+'\' value=\''+id_arme+'\'/>'+nom+'</td>');
                $('#ligne'+id).append('<td>'+type_+'</td>');
                $('#ligne'+id).append('<td>'+prix+'</td>');
                $('#ligne'+id).append('<td>'+pi+'</td>');
                $('#ligne'+id).append('<td>'+rup+'</td>');
                $('#ligne'+id).append('<td>'+modif+'</td>');
                $('#ligne'+id).append('<td><input type=\'button\' value=\'Retirer\' onclick="retirer_arme(\'ligne'+id+'\','+prix+');" /></td>');   
            po = po - parseFloat(prix);
            po = Math.round(po*10)/10;
            $('#porestantes').html(po);
        }
        else
        {
            alert('Vous n\'avez plus assez d\'argent.');
        }        
    }
    
    function ajout_protection(id_equipement,nom,type_,prix,pr,rup,modif)
    {        
        po = parseFloat($('#porestantes').html());
                
        if(po >= parseFloat(prix))
        {
            id++;
            $('#protections').append('<tr id=\'ligne'+id+'\'></tr>');
                $('#ligne'+id).append('<td><input type=\'hidden\' name=\'Prot'+id+'\' value=\''+id_equipement+'\'/>'+nom+'</td>');
                $('#ligne'+id).append('<td>'+type_+'</td>');
                $('#ligne'+id).append('<td>'+prix+'</td>');
                $('#ligne'+id).append('<td>'+pr+'</td>');
                $('#ligne'+id).append('<td>'+rup+'</td>');
                $('#ligne'+id).append('<td>'+modif+'</td>');
                $('#ligne'+id).append('<td><input type=\'button\' value=\'Retirer\' onclick="retirer_protection(\'ligne'+id+'\');" /></td>');  
            po = parseFloat(po) - parseFloat(prix);
            po = Math.round(po*10)/10;
            $('#porestantes').html(po);
        }
        else
        {
            alert('Vous n\'avez plus assez d\'argent.');
        }        
    }
    
    function retirer_arme(id,prix)
    {        
        po = parseFloat($('#porestantes').html());
        $("#"+id).remove();
		po = Math.round(po*10)/10;
        po = po + parseFloat(prix);
        $('#porestantes').html(po);
    }
    
    function retirer_protection(id,prix)
    {        
        po = parseFloat($('#porestantes').html());
        $("#"+id).remove();
		po = Math.round(po*10)/10;
        po = po + parseFloat(prix);
        $('#porestantes').html(po);
    }
    
    function retirer_equipement(id_ligne,id_equi,prix)
    {        
        po = parseFloat($('#porestantes').html());
        if(parseInt( $('#NbrEqui'+id_equi).html()) > 1)
        {
            //on diminue le nombre
            $('#NbrEqui'+id_equi).html( parseInt( $('#NbrEqui'+id_equi).html()) - 1.0 );
            $('#HidNbrEqui'+id_equi).val( parseInt( $('#NbrEqui'+id_equi).html()) );
        }
        else
        {
            //on supprime la ligne
            $("#"+id_ligne).remove();
        }
        po = po + parseFloat(prix);
		po = Math.round(po*10)/10;
        $('#porestantes').html(po);
    }
    
    function maj_type_arme()
    {
        for(a=0;a<= max_arme;a++)
        {
            if($('#TR_ARME_'+a).length)
            {                
                if(-1 != $("#TR_ARME_"+a).html().indexOf($("#type_arme").val()) )
                {
                    $("#TR_ARME_"+a).show();
                }
                else
                {
                    $("#TR_ARME_"+a).hide();
                }
            }            
        }        
    }
    maj_type_arme()
    
    function maj_type_protection()
    {
        for(a=0;a<= max_protection;a++)
        {
            if($('#TR_PROT_'+a).length)
            {                
                if(-1 != $("#TR_PROT_"+a).html().indexOf($("#type_protection").val()) )
                {
                    $("#TR_PROT_"+a).show();
                }
                else
                {
                    $("#TR_PROT_"+a).hide();
                }
            }            
        }        
    }
    maj_type_protection();
    
    function maj_type_equipement()
    {
        for(a=0;a<= max_equipement;a++)
        {
            if($('#TR_EQUI_'+a).length)
            {                
                if(-1 != $("#TR_EQUI_"+a).html().indexOf($("#type_equipement").val()) )
                {
                    $("#TR_EQUI_"+a).show();
                }
                else
                {
                    $("#TR_EQUI_"+a).hide();
                }
            }            
        }        
    }
    maj_type_equipement()
</script>