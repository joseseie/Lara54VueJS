<?php

namespace  App\Traints;
/**
 * Created by PhpStorm.
 * @autho
 * Date: 10/1/2017
 * Time: 5:04 PM
 */

trait PostsTrait
{

   public function likesOfThisPost()
   {
       dd($this->id);
   }
}