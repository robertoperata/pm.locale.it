<?php
namespace PrizBundle\Entity;
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 19/12/16
 * Time: 21.42
 */
class Project {

    protected $name;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}