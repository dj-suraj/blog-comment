<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Blog", inversedBy="comments")
     * @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     */
    public $blogs;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->blogs = new ArrayCollection();
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    public $description;

    /**
     * @var string
     *
     * @ORM\Column(name="is_approved", type="boolean")
     */
    public $is_approved = false;

    /**
     * @var int
     *
     * @ORM\Column(name="blog_id", type="integer")
     */
    public $blogId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    public $userId;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Comment
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
     * Set blogId
     *
     * @param integer $blogId
     * @return Comment
     */
    public function setBlogId($blogId)
    {
        $this->blogId = $blogId;

        return $this;
    }

    /**
     * Get blogId
     *
     * @return integer
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Comment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }


    /**
     * Set blogId
     *
     * @param integer $blogId
     * @return Comment
     */
    public function setIsApproved($is_approved)
    {

        $this->is_approved = $is_approved;
        return $this;
    }

    /**
     * Get blogId
     *
     * @return integer
     */
    public function getIsApproved()
    {
        return $this->is_approved;
    }

    /**
     * @param mixed $users
     * @return Comment
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @param mixed $blogs
     * @return Comment
     */
    public function setBlogs($blogs)
    {
        $this->blogs = $blogs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * @return ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

}
