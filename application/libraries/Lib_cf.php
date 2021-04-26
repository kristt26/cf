<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_cf
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

}

/* End of file Lib_cf.php */
