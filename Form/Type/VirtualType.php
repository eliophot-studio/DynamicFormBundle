<?php

/*
* This file is part of the ACSEO\Bundle\DynamicFormBundle Symfony bundle.
*
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace ACSEO\Bundle\DynamicFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

/**
 * Virtual Type : used for collection form type
 */
class VirtualType extends AbstractType
{
    private $options;
    private $field;

    public function __construct(array $options, $field)
    {
        $this->options = $options;
        $this->field = $field;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(array_key_exists('data', $this->options) && is_array($this->options['data'])) {
            unset($this->options['data']);
        }
        $builder->add('value', $this->field->type, $this->options);
    }

    public function getName()
    {
        return 'virtual';
    }
}