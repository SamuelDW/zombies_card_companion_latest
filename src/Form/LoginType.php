<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public const FORM_NAME = 'loginForm';

    /**
     *
     * @param FormBuilderInterface $builder
     * @param array<string, mixed> $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'required' => true,
                'label' => 'Username/Email',
                'attr' => [
                    'name' => '_username',
                ],
            ])
            ->add('password', PasswordType::class, [
                'required' => true,
                'label' => 'Password',
                'attr' => [
                    'name' => '_password',
                ],
            ]);
    }

    public function getBlockPrefix(): string
    {
        return self::FORM_NAME;
    }
}
