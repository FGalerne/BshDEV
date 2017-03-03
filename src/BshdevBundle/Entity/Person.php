<?php

namespace BshdevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 */
class Person
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
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }
    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }

    /************************* UPLOAD CV**************************************/
    public $fileCv;
    public function preUploadCv()
    {
        if (null !== $this->fileCv) {
            // do whatever you want to generate a unique name
            $this->imageCv = uniqid() . '.' . $this->fileCv->guessExtension();
        }
    }
    public function uploadCv()
    {
        if (null === $this->fileCv) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileCv->move($this->getUploadRootDir(), $this->imageCv);
        unset($this->fileCv);
    }
    public function removeUploadCv()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /****************************** UPLOAD IDENTITY *****************************************/
    public $fileIdentity;
    public function preUploadIdentity()
    {
        if (null !== $this->fileIdentity) {
            // do whatever you want to generate a unique name
            $this->imageIdentity = uniqid() . '.' . $this->fileIdentity->guessExtension();
        }
    }
    public function uploadIdentity()
    {
        if (null === $this->fileIdentity) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->fileIdentity->move($this->getUploadRootDir(), $this->imageIdentity);
        unset($this->fileIdentity);
    }
    public function removeUploadIdentity()
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
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $cp;

    /**
     * @var string
     */
    private $town;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cp
     *
     *
     *
     * @param string $cp
     * @return Person
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Person
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Person
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @var string
     */
    private $imageCv;


    /**
     * Set imageCv
     *
     * @param string $imageCv
     * @return Person
     */
    public function setImageCv($imageCv)
    {
        $this->imageCv = $imageCv;

        return $this;
    }

    /**
     * Get imageCv
     *
     * @return string 
     */
    public function getImageCv()
    {
        return $this->imageCv;
    }
    /**
     * @var string
     */
    private $job;


    /**
     * Set job
     *
     * @param string $job
     * @return Person
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }
    /**
     * @var string
     */
    private $imageIdentity;


    /**
     * Set imageIdentity
     *
     * @param string $imageIdentity
     * @return Person
     */
    public function setImageIdentity($imageIdentity)
    {
        $this->imageIdentity = $imageIdentity;

        return $this;
    }

    /**
     * Get imageIdentity
     *
     * @return string 
     */
    public function getImageIdentity()
    {
        return $this->imageIdentity;
    }
    /**
     * @var string
     */
    private $language;


    /**
     * Set language
     *
     * @param string $language
     *
     * @return Person
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
