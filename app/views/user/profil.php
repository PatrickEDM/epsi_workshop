<?php
/**
 * Created by PhpStorm.
 * User: PatrickEDM
 * Date: 04/10/2016
 * Time: 15:59
 */

?>
<div class="profil">
    <h3><?= $data['joueur']->prenom." ".$data['joueur']->nom; ?></h3>
<div class="row">
    <div class="col-md-6 col-sm-8">
        <p>Jeux 1</p>
        <div class="ct-chart ct-perfect-fourth"></div>
        <script>
		    new Chartist.Line('.ct-chart', {
  			    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
  			    series: [
    			    [12, 9, 7, 8, 5],
  			    ]
		    }, {
  				fullWidth: false,
  				height: 300,
  				width: 600,
  				chartPadding: {
    				right: 60
  				}
			});
        </script>
    </div>
    <div class="col-md-3 col-sm-8">
        <p>Jeux 2</p>
        <div class="ct-chart1 ct-perfect-fourth"></div>
        <script>
		    new Chartist.Line('.ct-chart1', {
  			    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
  			    series: [
    			    [12, 9, 7, 8, 5],
  			    ]
		    }, {
  				fullWidth: false,
  				height: 300,
  				width: 600,
  				chartPadding: {
    				right: 60
  				}
			});
        </script>
    </div>
    </div>
</div>
