<?php

if(!function_exists('setDateTimeFormat'))
{
  function setDateTimeFormat($value, $inputFormat, $outputFormat)
  {
    return DateTime::createFromFormat($inputFormat, $value)->format($outputFormat);
  }
}
