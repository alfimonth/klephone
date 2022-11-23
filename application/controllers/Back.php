<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{

    public function index()
    {
        cek_role();
    }
}
