<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobOfferRepository::class)]
class JobOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $salary;

    #[ORM\Column(type: 'string', length: 255)]
    private $jobType;

    #[ORM\Column(type: 'string', length: 255)]
    private $jobCtegory;

    #[ORM\Column(type: 'string', length: 255)]
    private $jobTitle;

    #[ORM\Column(type: 'string', length: 255)]
    private $location;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateCreated;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateUpdated;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateDeleted;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'jobOffers')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'jobOffers')]
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(string $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getJobCtegory(): ?string
    {
        return $this->jobCtegory;
    }

    public function setJobCtegory(string $jobCtegory): self
    {
        $this->jobCtegory = $jobCtegory;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->dateCreated;
    }

    public function setDateCreated(string $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateUpdated(): ?string
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(string $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    public function getDateDeleted(): ?string
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(string $dateDeleted): self
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }
}
