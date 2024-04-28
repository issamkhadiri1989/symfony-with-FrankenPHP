<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Routing\Attribute\Route;

class LdapController extends AbstractController
{
    public function __construct(private Ldap $ldap)
    {
    }

    #[Route('/ldap', name: 'app_ldap')]
    public function index(): Response
    {
//        $ldap = Ldap::create('ext_ldap', ['connection_string' => 'ldaps://openldap:636']);

//        $this->ldap->bind('cn=read-only-admin,dc=example,dc=com', 'password');
        $this->ldap->bind('cn=admin,dc=ramhlocal,dc=com', 'admin_pass');

        $query = $this->ldap->query('dc=ramhlocal,dc=com', 'uid=khatake');
        $results = $query->execute();
//
        foreach ($results as $entry) {
            // Do something with the results
            dump($entry);
        }

        return $this->render('ldap/index.html.twig', [
            'controller_name' => 'LdapController',
        ]);
    }
}
