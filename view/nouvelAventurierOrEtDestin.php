<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Or et point de destin</h1>
    <p style="text-align:justify;">
        Cher <?php echo $aventurier->NOM; ?>, vous avez obtenu <?php echo $aventurier->OR; ?> pièces d'or et <?php echo $aventurier->DESTIN; ?> points de destin. <br>
    </p>
    Si toutefois ce destin ne vous convient pas, vous pouvez encoder vous-même ces données (mais c'est triché) :<br><br>
     <form action='index.php' method='get'>
    Pièces d'or : <select name = 'OR'>
    <?php 
        if($aventurier->METIER->NOM == "Bourgeois")
        {
            ?>
                <option <?php if($aventurier->OR == "40"){echo " selected ";} ?> >40</option>
                <option <?php if($aventurier->OR == "50"){echo " selected ";} ?> >50</option>
                <option <?php if($aventurier->OR == "60"){echo " selected ";} ?> >60</option>
                <option <?php if($aventurier->OR == "70"){echo " selected ";} ?> >70</option>
                <option <?php if($aventurier->OR == "80"){echo " selected ";} ?> >80</option>
                <option <?php if($aventurier->OR == "90"){echo " selected ";} ?> >90</option>
                <option <?php if($aventurier->OR == "100"){echo " selected ";} ?> >100</option>
                <option <?php if($aventurier->OR == "110"){echo " selected ";} ?> >110</option>
                <option <?php if($aventurier->OR == "120"){echo " selected ";} ?> >120</option>
                <option <?php if($aventurier->OR == "130"){echo " selected ";} ?> >130</option>
                <option <?php if($aventurier->OR == "140"){echo " selected ";} ?> >140</option>
                <option <?php if($aventurier->OR == "150"){echo " selected ";} ?> >150</option>
                <option <?php if($aventurier->OR == "160"){echo " selected ";} ?> >160</option>
                <option <?php if($aventurier->OR == "170"){echo " selected ";} ?> >170</option>
                <option <?php if($aventurier->OR == "180"){echo " selected ";} ?> >180</option>
                <option <?php if($aventurier->OR == "190"){echo " selected ";} ?> >190</option>
                <option <?php if($aventurier->OR == "200"){echo " selected ";} ?> >200</option>
                <option <?php if($aventurier->OR == "210"){echo " selected ";} ?> >210</option>
                <option <?php if($aventurier->OR == "220"){echo " selected ";} ?> >220</option>
                <option <?php if($aventurier->OR == "230"){echo " selected ";} ?> >230</option>
                <option <?php if($aventurier->OR == "240"){echo " selected ";} ?> >240</option>
            <?php
        }
        else
        {
            ?>
                <option <?php if($aventurier->OR == "20"){echo " selected ";} ?> >20</option>
                <option <?php if($aventurier->OR == "30"){echo " selected ";} ?> >30</option>
                <option <?php if($aventurier->OR == "40"){echo " selected ";} ?> >40</option>
                <option <?php if($aventurier->OR == "50"){echo " selected ";} ?> >50</option>
                <option <?php if($aventurier->OR == "60"){echo " selected ";} ?> >60</option>
                <option <?php if($aventurier->OR == "70"){echo " selected ";} ?> >70</option>
                <option <?php if($aventurier->OR == "80"){echo " selected ";} ?> >80</option>
                <option <?php if($aventurier->OR == "90"){echo " selected ";} ?> >90</option>
                <option <?php if($aventurier->OR == "100"){echo " selected ";} ?> >100</option>
                <option <?php if($aventurier->OR == "110"){echo " selected ";} ?> >110</option>
                <option <?php if($aventurier->OR == "120"){echo " selected ";} ?> >120</option>
            <?php
        }
    ?>
    </select>
    <br>
    <br>
    Points de destin : 
    <select name = 'DESTIN'>
        <option <?php if($aventurier->DESTIN == "0"){echo " selected ";} ?> >0</option>
        <option <?php if($aventurier->DESTIN == "1"){echo " selected ";} ?> >1</option>
        <option <?php if($aventurier->DESTIN == "2"){echo " selected ";} ?> >2</option>
        <option <?php if($aventurier->DESTIN == "3"){echo " selected ";} ?> >3</option>
    </select>
   
	   
	<div style='text-align:center;'><input class='bouton' type='submit' value='continuer' /></div>
    <input type='hidden' value='nouvelAventurier' name='ctrl' />
    <input type='hidden' value='5' name='etape' />
    </form>
</div>