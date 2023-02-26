<?php

defined('BASEPATH') or exit('No direct script access allowed');

class timeshelper
{
    public function std()
    {
        $m          = DateTime::createFromFormat('U.u', microtime(true));
        $waktu      = $m->format("Y-m-d\TH:i:s.u");
        $timestamp  = substr($waktu, 0, 23) . "Z";

        return $timestamp;
    }
}
