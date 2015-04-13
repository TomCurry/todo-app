<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 07/04/15
 * Time: 11:41
 */

namespace Todo\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NewTaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('Add', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Todo\TaskBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'todo_taskbundle_task';
    }
}