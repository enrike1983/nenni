<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Block
 *
 * @ORM\Table(name="block")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlockRepository")
 * @Vich\Uploadable
 */
class Block
{
  use ORMBehaviors\Translatable\Translatable;

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
     * @ORM\Column(name="template", type="text")
     */
    private $template;

    /**
     * @var string
     *
     * @ORM\Column(name="block_group", type="string", length=255)
     */
    private $block_group;

    /**
     * @Vich\UploadableField(mapping="block_image", fileNameProperty="image.name", size="image.size", mimeType="image.mimeType", originalName="image.originalName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="block_video", fileNameProperty="video.name", size="video.size", mimeType="video.mimeType", originalName="video.originalName")
     *
     * @var File
     */
    private $videoFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $video;

    /**
     * @Vich\UploadableField(mapping="block_pdf", fileNameProperty="pdf.name", size="pdf.size", mimeType="pdf.mimeType", originalName="pdf.originalName")
     *
     * @var File
     */
    private $pdfFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $pdf;

    /**
     * @Vich\UploadableField(mapping="block_logo", fileNameProperty="logo.name", size="logo.size", mimeType="logo.mimeType", originalName="logo.originalName")
     *
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     *
     * @var EmbeddedFile
     */
    private $logo;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position = 0;

    public function __construct()
    {
        $this->image = new EmbeddedFile();
        $this->video = new EmbeddedFile();
        $this->pdf = new EmbeddedFile();
        $this->logo = new EmbeddedFile();
    }

    /**
     * @param $method
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return \Symfony\Component\PropertyAccess\PropertyAccess::createPropertyAccessor()->getValue($this->translate(), $method);
    }

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
     * Set template
     *
     * @param string $template
     *
     * @return Block
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set block_group
     *
     * @param string $block_group
     *
     * @return Block
     */
    public function setBlockGroup($block_group)
    {
        $this->block_group = $block_group;

        return $this;
    }

    /**
     * Get block_group
     *
     * @return string
     */
    public function getBlockGroup()
    {
        return $this->block_group;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param EmbeddedFile $image
     */
    public function setImage(EmbeddedFile $image)
    {
        $this->image = $image;
    }

    /**
     * @return EmbeddedFile
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile $video
     */
    public function setVideoFile(File $video = null)
    {
        $this->videoFile = $video;

        if ($video) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return File|null
     */
    public function getVideoFile()
    {
        return $this->videoFile;
    }

    /**
     * @param EmbeddedFile $video
     */
    public function setVideo(EmbeddedFile $video)
    {
        $this->video = $video;
    }

    /**
     * @return EmbeddedFile
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile $pdf
     */
    public function setPdfFile(File $pdf = null)
    {
        $this->pdfFile = $pdf;

        if ($pdf) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return File|null
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
    }

    /**
     * @param EmbeddedFile $pdf
     */
    public function setPdf(EmbeddedFile $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * @return EmbeddedFile
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile $logo
     */
    public function setLogoFile(File $logo = null)
    {
        $this->logoFile = $logo;

        if ($logo) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return File|null
     */
    public function getLogoFile()
    {
        return $this->logoFile;
    }

    /**
     * @param EmbeddedFile $logo
     */
    public function setLogo(EmbeddedFile $logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return EmbeddedFile
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Block
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}

