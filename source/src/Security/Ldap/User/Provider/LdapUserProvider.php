<?php

namespace App\Security\Ldap\User\Provider;

use App\Entity\User;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class LdapUserProvider implements UserProviderInterface
{
    public function __construct(private Ldap $ldap)
    {
    }

    /**
     * @param User $user
     * @return UserInterface
     */
    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return is_subclass_of($class, UserInterface::class);
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $this->ldap->bind('cn=admin,dc=ramhlocal,dc=com', 'admin_pass');

        $query = $this->ldap->query('dc=ramhlocal,dc=com', 'uid='.$identifier);

        $searchResult = $query->execute();

        return new User($identifier, '123456');
    }
}