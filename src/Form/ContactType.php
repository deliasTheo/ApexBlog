<?php
namespace App\Form;
use App\Entity\Contact;
use App\Entity\Tag;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, [
                'mapped' => false,
            ])
            ->add('lastname',TextType::class, [
            ])
            ->add('email',EmailType::class, [
            ])
           /* ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
            ])*/
           ->add('message', CKEditorType::class, [
               'attr' => ['class' => 'espaceCustom', 'rows' => 5],
               'label' => 'Message :'
           ]);

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}