<?php

namespace app\core;
use mysqli;

class DBConnection {
    public function connection() : mysqli {
        return new mysqli("localhost", "root", "", "vbis");
    }
}