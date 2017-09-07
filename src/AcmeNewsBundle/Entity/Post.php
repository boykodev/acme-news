<?php

namespace AcmeNewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post entity
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AcmeNewsBundle\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="announce", type="string", length=255)
     */
    private $announce;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var boolean $published
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set announce
     *
     * @param string $announce
     *
     * @return Post
     */
    public function setAnnounce($announce)
    {
        $this->announce = substr($announce, 0, 255);

        return $this;
    }

    /**
     * Get announce
     *
     * @return string
     */
    public function getAnnounce()
    {
        return $this->announce;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set date only on insert
     *
     * @ORM\PrePersist
     */
    public function setDate()
    {
        $this->date = new \DateTime("now");
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Post
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }
}
