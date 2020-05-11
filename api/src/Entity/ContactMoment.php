<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true}
 *
 * )
 *
 * @ORM\Entity(repositoryClass="App\Repository\ContactMomentRepository")
 * @Gedmo\Loggable(logEntryClass="Conduction\CommonGroundBundle\Entity\ChangeLog")
 *
 * @ApiFilter(BooleanFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
 * @ApiFilter(SearchFilter::class)
 */
class ContactMoment
{
    /**
     * @var UuidInterface The UUID identifier of this object
     *
     * @example e2984465-190a-4562-829e-a8cca81aa35d
     *
     * @Groups({"read"})
     * @Assert\Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string topic of the contact moment
     *
     * @example components
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotNull
     */
    private $topic;

    /**
     * @var string The message of the contact moment
     *
     * @example we talked about how to make an component
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=2550)
     * @Assert\Length(
     *     max = 2550
     * )
     * @Assert\NotNull
     */
    private $message;

    /**
     * @var string a contact component person
     *
     * @example https://cc.zaakonline.nl/people/e2984465-190a-4562-829e-a8cca81aa35d
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Url
     */
    private $sender;

    /**
     * @var string a contact component person
     *
     * @example https://cc.zaakonline.nl/people/e2984465-190a-4562-829e-a8cca81aa35d
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Url
     */
    private $receiver;

    /**
     * @var string The channel used for the contact moment
     *
     * @example Whatsapp
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=2550)
     * @Assert\Length(
     *     max = 2550
     * )
     * @Assert\NotNull
     */
    private $channel;

    /**
     * @var array The resource of the contact moment
     *
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="array", nullable=true)
     *
     */
    private $resources = [];

    /**
     * @var DateTime The date of the interaction.
     *
     * @Gedmo\Versioned
     * @example 10-12-2019
     *
     * @Assert\DateTime
     * @Groups({"read","write"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateInteraction;

    /**
     * @var Datetime $dateCreated The moment this resource was created
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var Datetime $dateModified  The moment this resource last Modified
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;


    public function getId()
    {
        return $this->id;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getChannel(): ?string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getResources(): ?array
    {
        return $this->resources;
    }

    public function setResources(array $resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    public function getDateInteraction(): ?\DateTimeInterface
    {
        return $this->dateInteraction;
    }

    public function setDateInteraction(\DateTimeInterface $dateInteraction): self
    {
        $this->dateInteraction= $dateInteraction;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated= $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }
}
