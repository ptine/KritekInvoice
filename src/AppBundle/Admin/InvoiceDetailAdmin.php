<?php
// src/AppBundle/Admin/InvoiceHeaderAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class InvoiceDetailAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        /*$formMapper->add('InvoiceId', 'entity', array(
            'class' => 'AppBundle\Entity\InvoiceHeader',
            'property' => 'id',
        ));*/

        $formMapper
            /*->add('InvoiceId', 'sonata_type_model_hidden')*/
            ->add('Description', 'text')
            ->add('Quantity', 'integer')
            ->add('Amount')
            ->add('Vat')
            ->add('TotalAmount')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        
        ->add('InvoiceId', null, array(), 'entity', array(
            'class'    => 'AppBundle\Entity\InvoiceHeader',
            'choice_label' => 'id', 
        ))
        ->add('Description')
        ->add('Quantity')
        ->add('Amount')
        ->add('Vat')
        ->add('TotalAmount')
    ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('InvoiceId')
        ->add('Description')
        ->add('Quantity')
        ->add('Amount')
        ->add('Vat')
        ->add('TotalAmount')
    ;
    }
}