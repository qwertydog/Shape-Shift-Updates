<?php

namespace SSPro;

class MyDB extends \SQLite3
{
    function __construct()
    {
        $this->open('ShiftDB.db');
    }

}