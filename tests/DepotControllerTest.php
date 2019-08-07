<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Application;

class DepotControllerTest extends WebTestCase
{
    public function testSomehing()
    {
        $client = static::createClient([],[
            "PHP_AUTH_USER"=>"jule2",
            "PHPH_PW"=>"jule2"
        ]);
        $crawler = $client->request('POST', '/depot/new',[],[],["COTENT_TYPE"=>"application/json"],
        '{
            "montant":79999,
            "dateDepot":"05-07-2019",
            "compte_partenaire_id":5,
            "user_id":3
        }');
        $reponse=$client->getResponse();
        $this->assertSame(201,$client->getResponse()->getStatusCode());
        
    }

    public function testUser()
    {
        $client = static::createClient([],[
            "PHP_AUTH_USER"=>"Souleymane",
            "PHPH_PW"=>"DIEME"
        ]);
        $crawler = $client->request('POST', '/user/new',[],[],["COTENT_TYPE"=>"application/json"],
        '{
            "username":"jule3",
            "password":"jule3",
            "roles":["ROLE_CAISSIER"],
            "matriculeUser":"m3",
            "nomUser":"jule3",
            "prenomUser":"jule3",
            "emailUser":"jule3@gmail.com",
            "telephoneUser":771208795,
            "adresseUser":"keur mbaye fall",
            "statusUser":"Activé"
        }');
        $reponse=$client->getResponse();
        $this->assertSame(201,$client->getResponse()->getStatusCode());
        
    }


}
