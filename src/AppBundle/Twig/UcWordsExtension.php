<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28-09-2017
 * Time: 11:48
 */

namespace AppBundle\Twig;


class UcWordsExtension extends \Twig_Extension
{

    public function getFilters() {
        return [
            new \Twig_SimpleFilter('ucwords', 'ucwords')
        ];
    }

}