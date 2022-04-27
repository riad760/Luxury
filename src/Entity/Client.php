<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameContact;

    #[ORM\Column(type: 'string', length: 255)]
    private $numberContact;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailContact;

    #[ORM\Column(type: 'string', length: 255)]
    private $typeJob;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameJob;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: JobOffer::class, orphanRemoval: true)]
    private $jobOffers;

    public function __construct()
    {
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): self
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getNumberContact(): ?string
    {
        return $this->numberContact;
    }

    public function setNumberContact(string $numberContact): self
    {
        $this->numberContact = $numberContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getTypeJob(): ?string
    {
        return $this->typeJob;
    }

    public function setTypeJob(string $typeJob): self
    {
        $this->typeJob = $typeJob;

        return $this;
    }

    public function getNameJob(): ?string
    {
        return $this->nameJob;
    }

    public function setNameJob(string $nameJob): self
    {
        $this->nameJob = $nameJob;

        return $this;
    }

    /**
     * @return Collection<int, JobOffer>
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setClient($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getClient() === $this) {
                $jobOffer->setClient(null);
            }
        }

        return $this;
    }
}
