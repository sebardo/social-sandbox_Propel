<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPeer.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUserPeer extends PluginsfGuardUserPeer {

    public function getAllUsers($sex = null, $minAge= null, $maxAge= null, $country= null) {
        $i = new Criteria();
//        $query = Doctrine_Query::create()
//                ->from('sfGuardUser e');

        if ($sex != null) {
            if ($sex == '2')
                $i->add(sfGuardUserPeer::SEX, '');
//                $query->where('e.sex = ?', '');
            else
                $i->add(sfGuardUserPeer::SEX, $sex);
//                $query->where('e.sex = ?', $sex);
        }

        if ($minAge != null && $maxAge != null) {
            $from = null;
            $thisYear = date('Y');
            $thisMonth = date('m');
            $thisDay = date('d');

            $yearSearch = $thisYear - $minAge;
            $from = $yearSearch . '-' . $thisMonth . '-' . $thisDay;

//                    $query->where('e.birthday < ?', $dateSearch);

            $to = null;
            $thisYear = date('Y');
            $thisMonth = date('m');
            $thisDay = date('d');

            $yearSearch = $thisYear - $maxAge;
            $to = $yearSearch . '-' . $thisMonth . '-' . $thisDay;

//                    $query->where('e.birthday > ?', $dateSearch);

            $criterion1 = $c->getNewCriterion(
                            sfGuardUserPeer::BIRTHDAY, $to, Criteria::GREATER_THAN
                    )->addAnd($c->getNewCriterion(
                                    sfGuardUserPeer::BIRTHDAY, $from, Criteria::LESS_THAN
                            ));

            $i->add($criterion1);

//            $query->andWhere('e.birthday BETWEEN ? AND ?', array($to, $from));
        }

        if ($country != null) {
            $i->add(sfGuardUserPeer::COUNTRY, $country);
//            $query->andWhere('e.country_id = ?', $country);
        }

        $i->addAscendingOrderByColumn(sfGuardUserPeer::USERNAME);
//        $query->orderBy('e.username ASC');
        return sfGuardUserPeer::doSelect($i);
        return $query->execute();
    }

}
