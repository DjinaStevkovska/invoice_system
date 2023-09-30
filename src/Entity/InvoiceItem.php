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
    private int $id;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: "invoiceItems")]
    #[ORM\JoinColumn(name: "invoice_id", referencedColumnName: "id", nullable: false)]
    private Invoice $invoice;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: "invoiceItems")]
    #[ORM\JoinColumn(name: "article_id", referencedColumnName: "id", nullable: false)]
    private Article $article;

    #[ORM\Column(type: "integer")]
    private int $quantity;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $totalPrice;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }
}
