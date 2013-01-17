<?php

class Form_Organisation_PublishToRegistry extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('id' , 'publish-to-registry-organisation');

        $form = array();

        $form['organisation_file_ids'] = new Zend_Form_Element_Hidden('organisation_file_ids');

        $form['push_to_registry_for_organisation'] = new Zend_Form_Element_Button('push_to_registry_for_organisation');
        $form['push_to_registry_for_organisation']->setLabel('Register In IATI Registry')
            ->setAttrib('class' , 'form-submit');

        $this->addElements($form);
    }
}