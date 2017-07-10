<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeoBlock
 *
 * @ORM\Table(name="seo_block")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeoBlockRepository")
 */
class SeoBlock
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
     * @ORM\Column(name="block_group", type="string", length=255)
     */
    private $block_group;

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
     * Set block_group
     *
     * @param string $block_group
     *
     * @return SeoBlock
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
}

