<?php

/**
 * Form Story create.
 * Form Story create.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class StoryCreateForm extends Form
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('story-create-form');
        // The form will hydrate an object of type "Story"
        $this->setHydrator(new DoctrineHydrator($entityManager));
        // Add the fieldset, and set it as the base fieldset
        $fieldset = new StoryFieldset($entityManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);
        // Add submit button
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => _('Create story'),
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}
