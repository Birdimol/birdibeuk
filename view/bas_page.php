			<div style='clear:both;'></div>
            <?php 
                if(DEBUG)
                {
                    global $global_debug;
                    if(!empty($global_debug))
                    {
                        echo "<div class='footer' ><u>Mode Debug activé :</u><br>".$global_debug."</div>";
                    }
                }
            ?>
			<div class='footer'>En cas d'hésitation, toute la documentation officielle des terres de Fangh se trouve ici : <a target='_blank' href='http://www.naheulbeuk.com/' >http://www.naheulbeuk.com/</a></div>
		</div>
        <!-- Piwik
       
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//www.favay.be/piwik/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', 2]);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <noscript><p><img src="//www.favay.be/piwik/piwik.php?idsite=2" style="border:0;" alt="" /></p></noscript>
        End Piwik Code -->
	</body>
</html>