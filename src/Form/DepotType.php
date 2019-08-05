<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Depot;
use App\Entity\ComptePartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;

class DepotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('dateDepot',DateType::class,[
                'widget'=>"single_text",
                'format'=>"yyyy-MM-dd"
            ])
            ->add('ComptePartenaire',EntityType::class, [
                'class' => ComptePartenaire::class,
                'choice_label' => 'compte_partenaire_id'])
            ->add('User',EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'user_id'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depot::class,
        ]);
    }
}
