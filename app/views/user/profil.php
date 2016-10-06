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
            <p>Memory</p>
            <div class="ct-chart ct-perfect-fourth"></div>
            <script>
                new Chartist.Line('.ct-chart', {
                    labels: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    series: [
                        [
                            <?php
                                if ($data['Memory']) {
                                    for ($i = 1; $i <= date('m'); $i++){
                                        if(intval($data['Memory'][0]->mois) == $i){
                                            echo $data['Memory'][0]->avg_score.',';
                                            array_shift($data['Memory']);
                                        }
                                        else if($i != date('m')){
                                            echo '0,';
                                        }
                                    }
                                }
                            ?>
                        ],
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
