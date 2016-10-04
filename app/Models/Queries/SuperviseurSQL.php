<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 10:00
 */

namespace Models\Queries;


use Helpers\DB\Query;

class SuperviseurSQL extends Query
{

    public function prepareFindByLogin($login) {
        $tmp = parent::__call("prepareFindByPseudo",array($login))->execute();
        if(count($tmp)==0)
            return false;
        return $tmp[0];
    }

    public function getPseudoById($id)
    {
        $personne = $this->findById($id);
        return $personne->pseudo;
    }

}