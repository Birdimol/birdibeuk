<div class='principal_avec_pub'>
    <style>
        table
        {
            border-collapse:collapse;
        }
    
        td
        {
            padding:5px;
        }
        
        div.feuille
        {
            border: 1px black solid;
            background-image:url(image/perso.jpg);
            width:1024px;
            height:1400px;
            -webkit-print-color-adjust: exact;
        }
        
        p
        {
            position:relative;
            font-weight:bold;
            color:black;
            font-size:26px;
        }
        
        p.prmax
        {
            font-size: 10px;
            left: 933px;
            top: 910px;
        }
        
        p.nom
        {				
            top:84px;
            left:310px;				
        }
        
        p.sexe
        {				
            top:25px;
            left:770px;				
        }
        
        p.origine
        {				
            top:19px;
            left:325px;				
        }
        
        p.metier
        {				
            top:-40px;
            left:600px;				
        }
        
        p.ev
        {
            top:-43px;
            left:562px;			
        }
        
        p.ea
        {
            top:-23px;
            left:562px;			
        }
        
        p.cou
        {
            top:22px;
            left:498px;			
        }
        
        p.int
        {
            top:3px;
            left:498px;			
        }
        
        p.cha
        {
            top:-16px;
            left:498px;			
        }
        
        p.chaModif
        {
            top:-35px;
            left:640px;	
        }
        
        p.ad
        {
            top:-36px;
            left:498px;			
        }
        
        p.fo
        {
            top:-55px;
            left:498px;			
        }
        
        p.niveau
        {
            top:355px;
            left:166px;			
        }
        
        p.resistMagic
        {
            top:322px;
            left:977px;			
        }
        
        p.magiePsy
        {
            top:321px;
            left:707px;	
        }
        
        p.magiePhy
        {
            top:320px;
            left:500px;	
        }
        
        p.destin
        {
            top:803px;
            left:41px;			
        }
        
        p.gold
        {
            top:907px;
            left:95px;			
        }
        
        p.attaqueOrigin
        {
            top:666px;
            left:510px;			
        }
        
        p.paradeOrigin
        {
            top:706px;
            left:510px;			
        }
        
        p.totalPR
        {
            top:855px;
            left:935px;			
        }
        
        table.Armes
        {
            font-weight:bold;
            font-size:22px;
            position:absolute;
            top:1121px;
            left:305px;
        }
        
        table.Armes tr td
        {
            padding: 0px;
        }
        
        table.Protections
        {
            font-weight:bold;
            font-size:22px;
            position:absolute;
            top:892px;
            left:305px;
        }
        
        table.Protections tr td
        {
            padding: 0px;
        }
        
        p.equipement
        {
            font-size:20px;
            top:1262px;
            left:305px;	
            width:720px;
            line-height: 1.4;
        }
        
        p.precieux
        {
            font-size:18px;
            top:1265px;
            left:25px;	
            width:240px;
            line-height: 1.5;
        }
        
        div.competences
        {
            font-weight:bold;
            font-size:18px;
            width:1024px;
            text-align:center;
        }
    </style>
    <img src='view/ficheDePerso2.php?id=<?php echo $aventurier->ID; ?>' />
    <form action='index.php' method='get'>
        <input type='hidden' value='ficheRapide' name='ctrl' />
        <input type='hidden' value='modification' name='action' />
        <input type='hidden' value='<?php echo $aventurier->ID; ?>' name='id_aventurier' />
        <label for='codeacces'>Code d'accès à cette fiche : </label><input type='text' value='' name='codeacces' /><input type='submit' value='Modifier' />
    </form>
</div>