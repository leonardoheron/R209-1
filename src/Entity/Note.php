<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="notes")
     */
    private $projet_id;

    /**
     * @ORM\ManyToOne(targetEntity=EtatNote::class, inversedBy="notes")
     */
    private $etat_note_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetId(): ?Projet
    {
        return $this->projet_id;
    }

    public function setProjetId(?Projet $projet_id): self
    {
        $this->projet_id = $projet_id;

        return $this;
    }

    public function getEtatNoteId(): ?EtatNote
    {
        return $this->etat_note_id;
    }

    public function setEtatNoteId(?EtatNote $etat_note_id): self
    {
        $this->etat_note_id = $etat_note_id;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
