<?php

namespace App\Annotation;


/**
* Annotation for parameter injection in Email contents
*
* @author Madiagne Sylla <Madiagne.Sylla@orange-sonatel.com>
*
* @Annotation
*/
final class QMLogger
{
    public $message;

    public function affiche()
    {
//        exit(var_dump($this->message));
    }
}
?>