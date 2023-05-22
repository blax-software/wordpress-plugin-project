<?php

namespace Blax\CSVFahrten\Database;

class ExampleDatabase extends \Blax\Wordpress\Extendables\Database
{
    /*
     * |--------------------------------------------------------------------------
     * | TABLE
     * |--------------------------------------------------------------------------
     * |
     * | This is the name the table will have in the database. It is automaticly
     * | prefixed with the wordpress prefix.
     * |
     */
    const TABLE = "example_table";

    /*
     * |--------------------------------------------------------------------------
     * | COLLUMNS
     * |--------------------------------------------------------------------------
     * |
     * | This are the collumns the table will have in the database. Migration
     * | happens by activating the plugin, by default.
     * |
     */
    const COLLUMNS = [
        "order_number"      =>  "bigint(20) NOT NULL PRIMARY KEY",
        "status"            =>  "varchar(16) NOT NULL",
        "pickup_time"       =>  "datetime DEFAULT NULL",
        "name"              =>  "varchar(50) DEFAULT NULL",
        "pickup_location"   =>  "varchar(50) DEFAULT NULL",
        "destination"       =>  "varchar(80) DEFAULT NULL",
        "note"              =>  "varchar(80) DEFAULT NULL",
        "there_or_back"     =>  "boolean NOT NULL DEFAULT false",
        "invoice_driving"   =>  "boolean NOT NULL DEFAULT false",
        "sick_driving"      =>  "boolean NOT NULL DEFAULT false",
        "transport_type"    =>  "varchar(16) DEFAULT NULL",
        "kilometers"        =>  "float NOT NULL DEFAULT '0'",
        "driver"            =>  "varchar(30) DEFAULT NULL",
        "vehicle"           =>  "int(11) DEFAULT NULL",
        "contractor"        =>  "varchar(30) DEFAULT NULL",
        "dispatcher"        =>  "varchar(30) DEFAULT NULL",
        "cost_center"       =>  "varchar(30) DEFAULT NULL",
        "category"          =>  "varchar(30) DEFAULT NULL",
        "passengers"        =>  "int(11) NOT NULL DEFAULT '1'",
        "price"             =>  "float DEFAULT NULL",
        "cash"              =>  "float NOT NULL DEFAULT '0'",
        "non_cash"          =>  "float NOT NULL DEFAULT '0'",
        "tax"               =>  "float NOT NULL DEFAULT '0'",
        // Invoice
        "billing_provider"  =>  "varchar(30) DEFAULT NULL",
        // Sick
        "single_or_serial_drive"        => "boolean DEFAULT NULL",
        "submission_date"               => "date DEFAULT NULL",
        "submission_price"              => "float DEFAULT NULL",
        "additional_payment_cash"       => "float DEFAULT NULL",
        "additional_payment_non_cash"   => "float DEFAULT NULL",
        "billed_price"                  => "float DEFAULT NULL",
        "billed_after"                  => "float DEFAULT NULL",
    ];
}
