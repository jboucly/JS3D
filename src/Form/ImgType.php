<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;

class ImgType extends AbstractType
{
    private $form;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('img', FileType::class, [
            'required' => true
        ])
        ->add('submit', SubmitType::class);
    }

    public function getForm()
    {   
        return $this->form;
    }
}
