<?php

class Iati_Aidstream_Element_Activity_ContactInfo extends Iati_Core_BaseElement
{   
    protected $isMultiple = true;
    protected $className = 'ContactInfo';
    protected $displayName = 'Contact Info';
    protected $tableName = 'iati_contact_info';
    protected $attribs = array('id');
    protected $childElements = array('Organisation','PersonName' , 'Telephone','Email','MailingAddress');
}
