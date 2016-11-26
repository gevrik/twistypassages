<?php

/**
 * Controller for Entity Vote.
 * Controller for Entity Vote.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VoteController extends AbstractActionController
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;


    /**
     * ProfileController constructor.
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(
        $entityManager
    )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return ViewModel
     */
    public function voteAction()
    {
        return array();
    }

}
