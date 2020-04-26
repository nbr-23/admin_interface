<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends EasyAdminController
{
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        $result = parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
        if (method_exists($entityClass, 'getUser')){
            $result->andWhere('entity.user = :user');
            $result->setParameter('user', $this->getUser());
        }
        return $result;
    }
}
