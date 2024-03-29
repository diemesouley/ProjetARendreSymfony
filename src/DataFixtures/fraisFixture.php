<?php

namespace App\DataFixtures;

use App\Entity\Frais;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class fraisFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
        $min=array(100,501,1001,1101,1501,2001,3001,5001,6001,10001,12001,15001,17001,20001,25001,30001,35001,40001,50001,60001,70001,75001,100001,125001,150001,175001,200001,250001,300001,350001,400001,500001,600001,700001,750001,1000001,1250001,1500001,2000001);
        $max=array(500,1000,1100,1500,2000,3000,5000,6000,10000,12000,15000,17000,20000,25000,30000,35000,40000,50000,60000,70000,75000,100000,125000,150000,175000,200000,250000,300000,350000,400000,500000,600000,700000,75000,1000000,1250000,1500000,2000000,3000000);
        $frais=array(50,100,100,100,200,200,400,600,600,900,900,1000,100,1500,1500,1500,1800,1800,2000,2700,2700,3000,3600,3600,3800,4600,6400,8000,8500,9900,11900,11900,13600,14500,21700,24500,31900,36000,0.2);
        for($i=0;$i<count($min);$i++){
            $tarif=new Frais();
            $tarif->setMin($min[$i]);
            $tarif->setMax($max[$i]);
            $tarif->setFrais($frais[$i]);
            $manager->persist($tarif);
        }
         $manager->flush();

        $manager->flush();
    }
}