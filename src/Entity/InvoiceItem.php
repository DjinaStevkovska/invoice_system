<?php

namespace App\Entity;

use App\Repository\InvoiceItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceItemRepository::class)]
class InvoiceItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: "invoiceItems")]
    #[ORM\JoinColumn(name: "invoice_id", referencedColumnName: "id")]
    private Invoice $invoice;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: "invoiceItems")]
    #[ORM\JoinColumn(name: "article_id", referencedColumnName: "id")]
    private Article $article;
    public function getId(): ?int
    {
        return $this->id;
    }
}
