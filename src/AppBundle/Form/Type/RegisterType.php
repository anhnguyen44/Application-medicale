<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use AppBundle\Entity\Speciality;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('username', TextType::class, [
                'label'=> "Nom d'utilisateur*",
                'attr' => array('maxlength' => 30)
            ])

            ->add('speciality', EntityType::class, array(
                'class' => 'AppBundle:Speciality',
                'choice_label' => 'speciality',
            ))

            ->add('notificationType',ChoiceType::class,[
                'choices' => [
                    'Nombre de notifications' => 1,
                    'Evaluateur particulier' => 2,
                    'Date' => 3,
                ]
            ])

            ->add('numberNotifications', IntegerType::class, [
                'data' => 1,
                'attr' => array('min' => 0, 'max' => 100)
            ])

            ->add('dateNotifications', IntegerType::class, [
                'data' => 1
            ])

            ->add('nonlocked',ChoiceType::class,[
                'choices' => [
                    'Oui' => false,
                    'Non' => true,
                ],
                'label' => 'Bloqué',
                'multiple'=>false,
                'expanded'=>true
            ])


            ->add('Enregistrer',SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'listSpe' => null,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
