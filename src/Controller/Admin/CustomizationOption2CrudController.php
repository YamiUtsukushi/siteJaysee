<?php

namespace App\Controller\Admin;

use App\Entity\CustomizationOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CustomizationOption2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomizationOption::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
