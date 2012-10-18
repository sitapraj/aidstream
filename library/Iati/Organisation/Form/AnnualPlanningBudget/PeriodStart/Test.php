<?php

class Iati_Organisation_Form_AnnualPlanningBudget_PeriodStart_Test extends Iati_Organisation_BaseForm
{   
    public function getFormDefination()
    {
        $this->setAttrib('class' , 'simplified-sub-element');
        
        $form['id'] = new Zend_Form_Element_Hidden('id');
        $form['id']->setValue($this->data['id']);
        
        $form['date'] = new Zend_Form_Element_Text('date');
        $form['date']->setLabel('test Date')
            ->setValue($this->data['date']);
        
        $form['text'] = new Zend_Form_Element_Textarea('text');
        $form['text']->setLabel('test Text')
            ->setRequired()
            ->addErrorMessage('Text cannot be empty')
            ->setAttrib('COLS', '40')
            ->setAttrib('ROWS', '4')
            ->setValue($this->data['text']);
        
        $this->addElements($form);
        return $this;
    }
}