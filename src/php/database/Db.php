<?php

class DB
{
    private static $con;

    public static function connect(){

        if(self::$con == null){

            self::$con = mysqli_connect("YOUR HOSTNAME HERE", "YOUR USERNAME HERE", "YOUR PASSWORD HERE", "YOUR DATABASE NAME HERE");
            return self::$con;

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
            
        }

        return self::$con;
    }

    
}