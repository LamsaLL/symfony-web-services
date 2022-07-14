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
     * Récupère le libellé d'un article dont on connaît l'id
     * @param int $id
     * @return \App\Soap\ProductSoap Le secteur avec l'id et le libellé
     */
    public function getProductById($id)
    {
        $article = $this->doct->getRepository(\App\Entity\Product::class)->find($id);
        $articleSoap = new ProductSoap($article->getId(), $article->getLibelle(), $article->getTexte(), $article->getVisuel(), $article->getPrix());
        return $articleSoap;
    }

    // /**
    //  * Retourne tous les articles
    //  * @param int $id
    //  * @return \App\Soap\ProductSoap Le secteur avec l'id et le libellé
    //  */
    // public function getAllProducts()
    // {
    //     $articles = $this->doct->getRepository(\App\Entity\Product::class)->findAll();

    //     $articlesSoap = [];
    //     foreach ($articles as $article) {
    //         array_push(new ProductSoap($article->getId(), $article->getLibelle(), $article->getTexte(), $article->getVisuel(), $article->getPrix(), $article->getCategory()));
    //     }
    //     return $articlesSoap;
    // }

    /**
     * retourne tous les articles d'une catégorie donnée
     * @param int $id
     * @return \App\Soap\CategorySoap Le secteur avec l'id et le libellé
     */
    public function getCategoryByProductId($id)
    {
        $article = $this->doct->getRepository(\App\Entity\Product::class)->find($id);
        $categorie = $article->getCategory();
        $categorieSoap = new CategorySoap($categorie->getId(), $categorie->getLibelle(), $categorie->getVisuel(), $categorie->getTexte());

        return $categorieSoap;
    }
 }