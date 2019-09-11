<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEnvoyeur')
            ->add('prenomEnvoyeur')
            ->add('telephoneEnvoyeur')
            ->add('nCI')
            ->add('nomRecepteur')
            ->add('prenomRecepteur')
            ->add('telephoneRecepteur')
            ->add('nCIRecepteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
