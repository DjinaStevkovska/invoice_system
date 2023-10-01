<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: "customer_id", referencedColumnName: "id")]
    private $customer;

    #[ORM\OneToMany(mappedBy: "invoice", targetEntity: InvoiceItem::class, cascade: ["persist", "remove"])]
    private Collection $invoiceItems;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $totalPrice;

    #[ORM\Column(type: "date")]
    private $dueDate;

    #[ORM\Column(type: "datetime")]
    private $createdAt;

    public function __construct()
    {
        $this->invoiceItems = new ArrayCollection();
    }

    public function getInvoiceItems(): Collection
    {
        return $this->invoiceItems;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }

    public function getCustomerName(): string
    {
        return $this->getCustomer()->getName();
    }


    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    // TODO: move to service
    public function addInvoiceItem(InvoiceItem $invoiceItem): self
    {
        if (!$this->invoiceItems->contains($invoiceItem)) {
            $this->invoiceItems[] = $invoiceItem;
            $invoiceItem->setInvoice($this);
        }

        return $this;
    }

    public function removeInvoiceItem(InvoiceItem $invoiceItem): self
    {
        if ($this->invoiceItems->contains($invoiceItem)) {
            $this->invoiceItems->removeElement($invoiceItem);
            // Set the owning side to null (unless already changed) fix property to nullable
            if ($invoiceItem->getInvoice() === $this) {
                $invoiceItem->setInvoice(null);
            }
        }

        return $this;
    }
}
