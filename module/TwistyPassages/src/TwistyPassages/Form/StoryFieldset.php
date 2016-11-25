<?php

/**
 * Fieldset for entity Story.
 * Fieldset for entity Story.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use TwistyPassages\Entity\Story;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class StoryFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('story');

        $this->setHydrator(new DoctrineHydrator($entityManager))
            ->setObject(new Story());

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'options' => array(
                'label' => _('Name'),
                'label_attributes' => array(
                    'class' => 'control-label',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'description',
            'options' => array(
                'label' => _('Description'),
                'label_attributes' => array(
                    'class' => 'control-label',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
            ),
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'status'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'genre',
            'options' => array(
                'label' => _('Genre'),
                'label_attributes' => array(
                    'class' => 'control-label',
                ),
                'value_options' => Story::$genreData
            ),
            'attributes' => array(
                'value' => '1',
                'class' => 'form-control',
            )
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'created'
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'updated'
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'likes'
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'dislikes'
        ));

        $this->add(array(
            'type' => 'hidden',
            'name' => 'author'
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false
            ),
            'name' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 128
                        ),
                    ),
                ),
            ),
            'description' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                ),
            ),
            'status' => array(
                'required' => false
            ),
            'genre' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'Zend\Filter\Int'),
                ),
                'validators' => array(
                ),
            ),
            'created' => array(
                'required' => false
            ),
            'updated' => array(
                'required' => false
            ),
            'likes' => array(
                'required' => false
            ),
            'dislikes' => array(
                'required' => false
            ),
            'author' => array(
                'required' => false
            ),
        );
    }
}
