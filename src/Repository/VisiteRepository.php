<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */

/**
 * @method Visite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visite[]    findAll()
 * @method Visite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }
    /**
     * Retourne toutes les visites triées sur un champ
     * @param string champ
     * @param string ordre
     * @return Visite[]  
     */
    public function findAllOrderBy($champ, $ordre) : array
    {
        return $this->createQueryBuilder("v")->orderBy("v." . $champ, $ordre)->getQuery()->getResult();
    }
    /**
     * Retourne les visites selon un critère d'égalité ou une relation d'ordre
     * @param mixed $champ
     * @param mixed $valeur
     * @return Visite[]
     */
    public function findByEqualValue($champ, $valeur) : array 
    {
        if($valeur != "")
        {
            return $this->createQueryBuilder("v")->where("v." . $champ . "=:valeur")->setParameter('valeur', $valeur)->orderBy('v.datecreation', 'DESC')->getQuery()->getResult();
        }
        else 
        {
            return $this->createQueryBuilder('v')->orderBy('v.' . $champ, 'ASC')->getQuery()->getResult();    
        }
    }
    /**
     * Supprime la ligne correspondant à l'objet passé en paramètre dans la base de données
     * @param Visite $visite
     * @return void
     */
    public function remove(Visite $visite) : void 
    {
        $this->getEntityManager()->remove($visite);
        $this->getEntityManager()->flush();
    }
}
