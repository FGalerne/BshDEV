<?php

namespace BshdevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partner
 */
class Partner
{
    /******************************************UPLOAD************************************************************/
    protected function getUploadDir()
    {
        return 'uploads';
    }
    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }
    public function getWebPath()
    {
        return null === $this->imageLogo ? null : $this->getUploadDir() . '/' . $this->imageLogo;
    }
    public function getAbsolutePath()
    {
        return null === $this->imageLogo ? null : $this->getUploadRootDir() . '/' . $this->imageLogo;
    }
    public $fileLogo;
    public function preUploadLogo()
    {
        if (null !== $this->fileLogo) {
            // do whatever you want to generate a unique name
            $this->imageLogo = uniqid() . '.' . $this->fileLogo->guessExtension();
        }
    }
    public function uploadLogo()
    {
        if (null === $this->fileLogo) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileLogo->move($this->getUploadRootDir(), $this->imageLogo);
        unset($this->fileLogo);
    }
    public function removeUploadLogo()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


    /************************************************GENERATE CODE*****************************************************/

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $alt;


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
     * Set title
     *
     * @param string $title
     * @return Partner
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Partner
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
     * Set alt
     *
     * @param string $alt
     * @return Partner
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
    /**
     * @var string
     */
    private $imageLogo;


    /**
     * Set imageLogo
     *
     * @param string $imageLogo
     * @return Partner
     */
    public function setImageLogo($imageLogo)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * Get imageLogo
     *
     * @return string 
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }
}