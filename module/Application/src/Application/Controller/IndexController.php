<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use TwistyPassages\Entity\Story;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;


    /**
     * IndexController constructor.
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(
        $entityManager
    )
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $toptenStories = $this->entityManager->getRepository('TwistyPassages\Entity\Story')->findBy(
            array(
                'status' => Story::STATUS_ACTIVE
            ),
            array(
                'likes' => 'desc'
            ),
            9
        );
        return new ViewModel(array(
            'toptenStories' => $toptenStories
        ));
    }

}
