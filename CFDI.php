<?php

include_once './Classes/XML.php';
include_once './Classes/Comprobante.php';
include_once './Classes/Emisor.php';

class CFDI
{
    $setXML = new setXML();
    protected $comprobante;
    protected $xml;

    function __construct($array_data)
    {
        var_dump($array_data);
        $this->comprobante = new Comprobante();
        $this->emisor = new Emisor();

        $objeto->setXML();
        
    }

    public function getNode()
    {
        $this->xml = '<?xml version="1.0" encoding="UTF-8"?> <cfdi:Comprobante  xmlns:cfdi="http://www.sat.gob.mx/cfd/3"  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" ' . $this->comprobante->getAtributes() . ' >';
        $this->xml .= $this->emisor->getNode(); 
        $this->xml .= '</cfdi:Comprobante>';
        return $this->xml;
    }

    public function setXML($array_data){
        //Obtener el XML por medio de la clase XML
        foreach ($array_data as $key => $value) :
            if ($key != (string) 'Comprobante') :
                foreach ($value as $attribute => $value) :
                //Setear attributos
                $this->emisor->setAtribute($attribute, $value);
                endforeach;
            elseif ($key != (string) 'Emisor'):
                foreach ($value as $attribute => $value) :
                    //Setear attributos
                    $this->comprobante->setAtribute($attribute, $value);
                endforeach;
            endif;
        endforeach;
    }
}