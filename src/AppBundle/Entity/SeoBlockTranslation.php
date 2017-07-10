<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity
 */
class SeoBlockTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="og_type", type="string", length=255, nullable=true)
     */
    private $ogType;

    /**
     * @var string
     *
     * @ORM\Column(name="og_title", type="string", length=255, nullable=true)
     */
    private $ogTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="og_description", type="string", length=255, nullable=true)
     */
    private $ogDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="og_site_name", type="string", length=255, nullable=true)
     */
    private $ogSiteName;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_card", type="string", length=255, nullable=true)
     */
    private $twitterCard;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_title", type="string", length=255, nullable=true)
     */
    private $twitterTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_description", type="string", length=255, nullable=true)
     */
    private $twitterDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_url", type="string", length=255, nullable=true)
     */
    private $twitterUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_image", type="string", length=255, nullable=true)
     */
    private $twitterImage;

    /**
     * @var string
     *
     * @ORM\Column(name="og_image", type="string", length=255, nullable=true)
     */
    private $ogImage;

    /**
     * @var string
     *
     * @ORM\Column(name="og_url", type="string", length=255, nullable=true)
     */
    private $ogUrl;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return SeoBlock
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
     *
     * @return SeoBlock
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
     * Set ogType
     *
     * @param string $ogType
     *
     * @return SeoBlock
     */
    public function setOgType($ogType)
    {
        $this->ogType = $ogType;

        return $this;
    }

    /**
     * Get ogType
     *
     * @return string
     */
    public function getOgType()
    {
        return $this->ogType;
    }

    /**
     * Set ogTitle
     *
     * @param string $ogTitle
     *
     * @return SeoBlock
     */
    public function setOgTitle($ogTitle)
    {
        $this->ogTitle = $ogTitle;

        return $this;
    }

    /**
     * Get ogTitle
     *
     * @return string
     */
    public function getOgTitle()
    {
        return $this->ogTitle;
    }

    /**
     * Set ogDescription
     *
     * @param string $ogDescription
     *
     * @return SeoBlock
     */
    public function setOgDescription($ogDescription)
    {
        $this->ogDescription = $ogDescription;

        return $this;
    }

    /**
     * Get ogDescription
     *
     * @return string
     */
    public function getOgDescription()
    {
        return $this->ogDescription;
    }

    /**
     * Set ogSiteName
     *
     * @param string $ogSiteName
     *
     * @return SeoBlock
     */
    public function setOgSiteName($ogSiteName)
    {
        $this->ogSiteName = $ogSiteName;

        return $this;
    }

    /**
     * Get ogSiteName
     *
     * @return string
     */
    public function getOgSiteName()
    {
        return $this->ogSiteName;
    }

    /**
     * Set twitterCard
     *
     * @param string $twitterCard
     *
     * @return SeoBlock
     */
    public function setTwitterCard($twitterCard)
    {
        $this->twitterCard = $twitterCard;

        return $this;
    }

    /**
     * Get twitterCard
     *
     * @return string
     */
    public function getTwitterCard()
    {
        return $this->twitterCard;
    }

    /**
     * Set twitterTitle
     *
     * @param string $twitterTitle
     *
     * @return SeoBlock
     */
    public function setTwitterTitle($twitterTitle)
    {
        $this->twitterTitle = $twitterTitle;

        return $this;
    }

    /**
     * Get twitterTitle
     *
     * @return string
     */
    public function getTwitterTitle()
    {
        return $this->twitterTitle;
    }

    /**
     * Set twitterDescription
     *
     * @param string $twitterDescription
     *
     * @return SeoBlock
     */
    public function setTwitterDescription($twitterDescription)
    {
        $this->twitterDescription = $twitterDescription;

        return $this;
    }

    /**
     * Get twitterDescription
     *
     * @return string
     */
    public function getTwitterDescription()
    {
        return $this->twitterDescription;
    }

    /**
     * Set twitterUrl
     *
     * @param string $twitterUrl
     *
     * @return SeoBlock
     */
    public function setTwitterUrl($twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;

        return $this;
    }

    /**
     * Get twitterUrl
     *
     * @return string
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    /**
     * Set twitterImage
     *
     * @param string $twitterImage
     *
     * @return SeoBlock
     */
    public function setTwitterImage($twitterImage)
    {
        $this->twitterImage = $twitterImage;

        return $this;
    }

    /**
     * Get twitterImage
     *
     * @return string
     */
    public function getTwitterImage()
    {
        return $this->twitterImage;
    }

    /**
     * Set ogImage
     *
     * @param string $ogImage
     *
     * @return SeoBlock
     */
    public function setOgImage($ogImage)
    {
        $this->ogImage = $ogImage;

        return $this;
    }

    /**
     * Get ogImage
     *
     * @return string
     */
    public function getOgImage()
    {
        return $this->ogImage;
    }

    /**
     * Set ogUrl
     *
     * @param string $ogUrl
     *
     * @return SeoBlock
     */
    public function setOgUrl($ogUrl)
    {
        $this->ogUrl = $ogUrl;

        return $this;
    }

    /**
     * Get ogUrl
     *
     * @return string
     */
    public function getOgUrl()
    {
        return $this->ogUrl;
    }
}

