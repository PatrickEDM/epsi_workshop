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
            <?php
            $scoreMemory = array();
            $dateMemory = array();
            $scoreMotsCases = array();
            $dateMotsCases = array();
            if ($data['Memory'])
            {
                foreach($data['Memory'] as $stat)
                {
                    array_push($scoreMemory,$stat->score);
                    array_push($dateMemory,$stat->date);
                }
            }

            if($data['Mots_cases'])
            {
                foreach($data['Mots_cases'] as $stat)
                {
                    array_push($scoreMotsCases,$stat->score);
                    array_push($dateMotsCases,$stat->date);
                }
            }


            ?>
            <script>
                new Chartist.Line('.ct-chart', {
                    labels: ['janvier','février'],
                    series: [
                        [0,1],
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
