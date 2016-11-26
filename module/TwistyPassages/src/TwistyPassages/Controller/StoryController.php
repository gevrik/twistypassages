<?php

/**
 * Controller for Entity Story.
 * Controller for Entity Story.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Controller;

use TwistyPassages\Entity\Story;
use TwistyPassages\Form\StoryCreateForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StoryController extends AbstractActionController
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
    public function indexAction()
    {
        // get user
        $user = $this->zfcUserAuthentication()->getIdentity();
        // get user
        return new ViewModel(array(
            'user' => $user
        ));
    }

    public function createAction()
    {
        // get user
        $user = $this->zfcUserAuthentication()->getIdentity();
        // create the form and inject the entity manager
        $form = new StoryCreateForm($this->entityManager);
        // create a new story and bind it to the form
        $story = new Story();
        // bind to form
        $form->bind($story);
        // check if we received a post request and create the story
        if ($this->request->isPost()) {
            // hydrate the entity
            $form->setData($this->request->getPost());
            // check if the form object is valid
            if ($form->isValid()) {
                // set non-form data
                $story->setAuthor($user->getProfile());
                $story->setStatus(Story::STATUS_ACTIVE);
                $story->setCreated(new \DateTime());
                $story->setUpdated(new \DateTime());
                $story->setDislikes(0);
                $story->setLikes(0);
                // persist and flush
                $this->entityManager->persist($story);
                $this->entityManager->flush($story);
                // redirect to full view
                $this->redirect()->toRoute('story', array('action' => 'detail', 'id' => $story->getId()));
            }
        }
        // return the form
        return array(
            'form' => $form
        );
    }

    public function detailAction()
    {
        // get user
        $user = $this->zfcUserAuthentication()->getIdentity();
        // get story id from route
        $storyId = $this->params()->fromRoute('id');
        $story = $this->entityManager->find('TwistyPassages\Entity\Story', $storyId);
        return new ViewModel(array(
            'user' => $user,
            'story' => $story
        ));
    }

}
