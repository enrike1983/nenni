<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * @ORM\Entity
 */
class MenuItemTranslation
{
	use ORMBehaviors\Translatable\Translation;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="label", type="string", length=255, nullable=true)
	 */
	private $label;

	public function getId()
    {
    	return $this->id;
    }

	/**
	* Set label
	*
	* @param string $label
	*
	* @return \AppBundle\Entity\MenuItemTranslation
	*/
	public function setLabel($label)
	{
		 $this->label = $label;

		 return $this;
	}

	/**
	* Get label
	*
	* @return string
	*/
	public function getLabel()
	{
		return $this->label;
	}
}
