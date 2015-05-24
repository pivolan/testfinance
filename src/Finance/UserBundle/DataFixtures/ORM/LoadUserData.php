<?php

namespace Application\Sonata\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Util\UserManipulator;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements ContainerAwareInterface, FixtureInterface
{
    /** @var ContainerInterface */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        /** @var UserManipulator $manipulator */
        $manipulator = $this->container->get('fos_user.util.user_manipulator');
        $password = 'qwerty';
        $manipulator->create('admin', $password, 'admin@admin.lo', false, true);

        $s = range(2, 15);
        foreach ($s as $id) {
            $username = 'user' . $id;
            $manipulator->create($username, $password, $username . '@admin.lo', false, false);
        }
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}