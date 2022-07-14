<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
/**
 * @ApiResource
 * @ApiFilter(OrderFilter::class, properties={"date"})
 * @ApiFilter(ExistsFilter::class, properties={"status"})
 * @ApiFilter(
 *  SearchFilter::class, properties={
 *    "user.email": "exact",
 *    "status": "exact",
 *  })
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="datetime")
   */
  private $date;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $status;

  /**
   * @ApiSubresource
   * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ApiSubresource
   * @ORM\OneToMany(targetEntity=OrderRow::class, mappedBy="orderItem", orphanRemoval=true, cascade={"persist"})
   */
  private $orderRows;

  public function __construct()
  {
    $this->orderRows = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDate(): ?\DateTimeInterface
  {
    return $this->date;
  }

  public function setDate(\DateTimeInterface $date): self
  {
    $this->date = $date;

    return $this;
  }

  public function getStatus(): ?string
  {
    return $this->status;
  }

  public function setStatus(string $status): self
  {
    $this->status = $status;

    return $this;
  }

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setUser(?User $user): self
  {
    $this->user = $user;

    return $this;
  }

  /**
   * @return Collection|OrderRow[]
   */
  public function getOrderRows(): Collection
  {
    return $this->orderRows;
  }

  public function addOrderRow(OrderRow $orderRow): self
  {
    if (!$this->orderRows->contains($orderRow)) {
      $this->orderRows[] = $orderRow;
      $orderRow->setOrderItem($this);
    }

    return $this;
  }

  public function removeOrderRow(OrderRow $orderRow): self
  {
    if ($this->orderRows->removeElement($orderRow)) {
      // set the owning side to null (unless already changed)
      if ($orderRow->getOrderItem() === $this) {
        $orderRow->setOrderItem(null);
      }
    }

    return $this;
  }
}