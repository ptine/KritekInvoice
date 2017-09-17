<?php
// src/AppBundle/Admin/InvoiceAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InvoiceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Invoice')
                ->add('InvoiceDate', 'date')
                ->add('InvoiceNumber', 'integer')
                ->add('CustomerId', 'integer')
                ->end()
            ->with('Invoice Rows')
            ->add('invoiceRows', 'sonata_type_collection', array(
                
                'type_options' => array(
                    
                    'delete' => true,
                    
                )
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))
            ->end();

            
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('InvoiceDate');
        $datagridMapper->add('InvoiceNumber');
        $datagridMapper->add('CustomerId');        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('InvoiceDate');
        $listMapper->addIdentifier('InvoiceNumber');
        $listMapper->addIdentifier('CustomerId');
    }

    public function preUpdate($invoice) {
        foreach($invoice->getInvoiceRows() as $row) {
            
            $row->setInvoiceId($invoice);
        }
    }

    public function prePersist($invoice) 
    { 
        $invoiceRows = $this->getForm()->get('invoiceRows')->getData(); 
        foreach ($invoiceRows as $row) 
        {
            $row->setInvoiceId($invoice);
        }
    } 
}