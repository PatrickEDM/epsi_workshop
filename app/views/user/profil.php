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
            <p>
                <?php
                    /*foreach ($data['Nom_Jeux'] as $key => $name){
                        echo $name;
                        if($key != COUNT($data['Nom_Jeux'])-1){
                            echo " , ";
                        }
                    }*/
                ?>
                <span style="color: #000000; font-weight: bold; font-size: 25px;">&rArr;</span>Memory<br/>
                <span style="color: #F05B4F; font-weight: bold; font-size: 25px;">&rArr;</span>Mots casés<br/>
            </p>
            <div class="ct-chart ct-perfect-fourth"></div>
            <?= var_dump($data); ?>            <script>
                new Chartist.Line('.ct-chart', {
                    labels: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    series: [
                            <?php
                                foreach ($data['Jeux'] as $key => $j) {
                                    echo "[";
                                    for ($i = 1; $i <= date('m'); $i++) {
                                        if (intval($j[0]->mois) == $i) {
                                            echo $j[0]->avg_score . ',';
                                            array_shift($j);
                                        } else if ($i != date('m')) {
                                            echo '0,';
                                        }
                                    }
                                    echo "],";
                                }
                            ?>
                    ]
                }, {
                    fullWidth: false,
                    height: 300,
                    width: 600,
                    high: 100,
                    chartPadding: {
                        right: 60
                    }

                });
            </script>
        </div>
    </div>
</div>
