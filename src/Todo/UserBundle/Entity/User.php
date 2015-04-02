<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 30/03/15
 * Time: 10:46
 */

namespace Todo\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser {

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Todo\UserBundle\Entity\Task", mappedBy="user")
     */
    protected $id;









}