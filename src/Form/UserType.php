<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Partenaire;
use App\Entity\ComptePartenaire;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('matriculeUser')
            ->add('nomUser')
            ->add('prenomUser')                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
            ->add('emailUser')
            ->add('adresseUser')
            ->add('telephoneUser')
            ->add('statusUser')
    
            ->add('imageFile', VichFileType::class)
            /*->add('Partenaire', EntityType::class,[
                'class'=> Partenaire::class,
                'choice_label'=>'partenaire_id'
            ])
            ->add('ComptePartenaire', EntityType::class,[
                'class'=> ComptePartenaire::class,
                'choice_label'=>'compte_partenaire_id'])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection'=>false
        ]);
    }
}
