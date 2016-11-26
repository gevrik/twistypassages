<?php

/**
 * Story Entity.
 * Twisty Passages runs on stories. This entity holds information about those story objects.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity(repositoryClass="TwistyPassages\Repository\StoryRepository") */
class Story
{

    const STATUS_ACTIVE = 10;

    static $genreData = array(
        0 => '---',
        1 => 'Fiction',
        2 => 'Comedy',
        3 => 'Drama',
        4 => 'Horror',
        5 => 'Non-fiction',
        6 => 'Realistic fiction',
        7 => 'Romance',
        8 => 'Satire',
        9 => 'Tragedy',
        10 => 'Tragicomedy'
    );

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     * @var int
     */
    protected $status;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     * @var int
     */
    protected $genre;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    protected $updated;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     * @var int
     */
    protected $likes;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     * @var int
     */
    protected $dislikes;

    // ORM

    /**
     * @ORM\ManyToOne(targetEntity="TwistyPassages\Entity\Profile")
     **/
    protected $author;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Story
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Story
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Story
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Story
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param int $genre
     * @return Story
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return Story
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return Story
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return int
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param int $likes
     * @return Story
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
        return $this;
    }

    /**
     * @return int
     */
    public function getDislikes()
    {
        return $this->dislikes;
    }

    /**
     * @param int $dislikes
     * @return Story
     */
    public function setDislikes($dislikes)
    {
        $this->dislikes = $dislikes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Story
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

}
