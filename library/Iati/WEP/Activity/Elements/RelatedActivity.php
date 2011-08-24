<?php
class Iati_WEP_Activity_Elements_RelatedActivity extends Iati_WEP_Activity_Elements_ElementBase
{
    protected $attributes = array('id', 'text', 'code', 'ref', 'xml_lang');
    protected $text;
    protected $code;
    protected $ref;
    protected $xml_lang;
    protected $id = 0;
    protected $options = array();
    protected $validators = array(
                                'text' => 'NotEmpty',
                            );
    protected $className = 'RelatedActivity';
    protected $attributes_html = array(
                'id' => array(
                    'name' => 'id',
                    'html' => '<input type= "hidden" name="%(name)s" value= "%(value)s" />' 
                ),
                'text' => array(
                    'name' => 'text',
                    'label' => 'Text',
                    'html' => '<input type="text" name="%(name)s" %(attrs)s value= "%(value)s" />',
                    'attrs' => array('class' => array('form-text'))
                ),
                'type' => array(
                    'name' => 'type',
                    'label' => 'Flow Type Code',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
                'ref' => array(
                    'name' => 'ref',
                    'label' => 'Identifier',
                    'html' => '<input type="text" name="%(name)s" %(attrs)s value= "%(value)s" />',
                    'attrs' => array('class' => array('form-text'))
                ),
                'xml_lang' => array(
                    'name' => 'xml_lang',
                    'label' => 'Language',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
    );
    
    protected static $count = 0;
    protected $objectId;
    protected $error = array();
    protected $hasError = false;
    protected $multiple = true;
   
    public function __construct()
    {
        parent::__construct();
        $this->objectId = self::$count;
        self::$count += 1;
        $this->setOptions();
    }
    
    public function setOptions()
    {
        $model = new Model_Wep();
        $this->options['type'] = $model->getCodeArray('RelatedActivityType', null, '1');
        $this->options['xml_lang'] = $model->getCodeArray('Language', null, '1');
    }
    
    public function setAttributes ($data) {
        $this->id = (isset($data['id']))?$data['id']:0;
        $this->text = $data['text'];
        $this->type = (key_exists('@type', $data))?$data['@type']:$data['type'];
        $this->ref = (key_exists('@ref', $data))?$data['@ref']:$data['ref'];
        $this->xml_lang = key_exists('@xml_lang', $data)?$data['@xml_lang']:$data['xml_lang'];
        
    }
    
    public function getOptions($name = NULL)
    {
        return $this->options[$name];
    }
    
    public function getObjectId()
    {
        return $this->objectId;
    }
    
    public function getValidator($attr)
    {
        return $this->validators[$attr];
    }
    
    public function validate()
    {
        $data['id'] = $this->id;
        $data['text'] = $this->text;
        $data['type'] = $this->type;
        $data['ref'] = $this->ref;
        $data['xml_lang'] = $this->xml_lang;
        
        parent :: validate($data);
    }
    
    public function getCleanedData(){
        $data = array();
        $data ['id'] = $this->id;
        $data['text'] = $this->text;
        $data['@type'] = $this->type;
        $data['@ref'] = $this->ref;
        $data['@xml_lang'] = $this->xml_lang;
        
        return $data;
    }
    

}