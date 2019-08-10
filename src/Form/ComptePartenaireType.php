<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Partenaire;
use App\Entity\ComptePartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ComptePartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numCompte')
            ->add('soldeCompte')
            ->add('dateDepot',DateType::class,[
                'widget'=>"single_text",
                'format'=>"yyyy-MM-dd"
            ])
            ->add('Partenaire',EntityType::class, [
                'class' => Partenaire::class,
                'choice_label' => 'partenaire_id'])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ComptePartenaire::class,
        ]);
    }
}
