<?php

namespace Application\Sonata\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Finance\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.lo');
        $user->setPlainPassword('qwerty');
        $user->setEnabled(true);
        $user->addRole(User::ROLE_SUPER_ADMIN);
        $manager->persist($user);

        $s = range(2, 15);

        foreach ($s as $id) {
            $user = new User();
            $typeName = 'client' . $id;
            $user->setUsername($typeName);
            $user->setEmail($typeName . '@admin.lo');
            $user->setPlainPassword('qwerty');
            $user->setEnabled(true);
            $manager->persist($user);
            $this->addReference($id, $user);
        }

        $manager->flush();
    }
}