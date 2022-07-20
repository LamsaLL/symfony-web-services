<?php

namespace App\Soap;

use Doctrine\Persistence\ManagerRegistry;
use App\Soap\ProductSoap;
use App\Soap\CategorySoap;

/**
 * Class SoapOperations
 * @package App\Soap
 */
class SoapOperations
{
    private $doct;

    /**
     * SoapOperations constructor.
     * @param ManagerRegistry $doct
     */
    public function __construct(ManagerRegistry $doct)
    {
        $this->doct = $doct;
    }

    /**
     * Dis "Hello" à la personne passée en paramètre
     * @param string $name Le nom de la personne à qui dire "Hello!"
     * @return string The hello string
     */
    public function sayHello(string $name): string
    {
        return 'Hello ' . $name . '!';
    }

    /**
     * Réalise la somme de deux entiers
     * @param int $a 1er nombre
     * @param int $b 2ème nombre
     * @return int La somme des deux entiers
     */
    public function sumHello(int $a, int $b): int
    {
        return (int)($a + $b);
    }

    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float
     */
    public function sumFloats(float $a, float $b, float $c): float
    {
        return (float)($a + $b + $c);
    }

    /**
     * Récupère le libellé d'un produit dont on connaît l'id
     * @param int $id
     * @return \App\Soap\ProductSoap Le produit avec l'id  le libellé, le texte, le prix et l'image
     */
    public function getProductById($id) : ProductSoap
    {
        $product = $this->doct->getRepository(\App\Entity\Product::class)->find($id);
        return new ProductSoap($product->getId(), $product->getName(), $product->getText(), $product->getImage(), $product->getPrice());
    }

    /**
     * Retourne tous les produits
     * @return \App\Soap\ProductSoap Les produits
     */
    public function getAllProducts(): Array
    {
        $products = $this->doct->getRepository(\App\Entity\Product::class)->findAll();
        $productsSoap = [];
        foreach ($products as $product) {
            $productsSoap[] = new ProductSoap($product->getId(), $product->getName(), $product->getText(), $product->getImage(), $product->getPrice());
        }
        return $productsSoap;
    }


    /**
     * retourne tous les produits d'une catégorie donnée
     * @param int $id
     * @return \App\Soap\CategorySoap La categorie avec l'id, le libellé le texte et l'image
     */
    public function getCategoryByProductId($id) : CategorySoap
    {
        $product = $this->doct->getRepository(\App\Entity\Product::class)->find($id);
        $category = $product->getCategory();
        return new CategorySoap($category->getId(), $category->getName(), $category->getText(), $category->getImage());
    }
 }