<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database and Table
    |--------------------------------------------------------------------------
    |
    | The default database configuration to connect to.
    | Please note, this database connection must be configured in config/database.php
    | 
    |
    */

    'default' => [

        'database' => 'Iliad',
        'table' => 'Consols'
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Databases
    |--------------------------------------------------------------------------
    |
    | In the database array, you can specify as many database connections as you wish.
    | Each database accepts the database name as the first parameter. (eg = Iliad)
    | Under each database, you must specify a table under the key "tables"
    | Under each table, you can specify: "UpdateKey" and "Columns"
    |
    | UpdateKey: The distinct key to look for when updating data into the specified database table.
    | Columns: The Columns array accept the actual names of the database table as well as the XML parser rules.
    |
    */

    'databases' => [
        'IliadQA' => [
            'tables' => [
                'Consols' => [
                    'UpdateKey' => 'consolID',
                    'Columns' => [
                        'consolID' => ['uses' => 'TransportMaster.TransportMasterId', 'default' => 'Blabla'],
                        'type' => [],
                        'transport' => [],
                        'carrierScacCode' => [],
                        'master' => [],
                        'serviceLevel' => [],
                        'firstLoad' => [],
                        'firstLoadCountry' => [],
                        'lastDisch' => [],
                        'lastDischCtry' => [],
                        'flightVoyage' => [],
                        'ETD' => [],
                        'mainLegETD' => [],
                        'ATD' => [],
                        'ETA' => [],
                        'ATA' => [],
                        'firstLegLoad' => [],
                        'firstLegLoadCtry' => [],
                        'lastLegDisch' => [],
                        'lastLegDischCtry' => [],
                        'firstLegLoadETD' => [],
                        'firstLegLoadATD' => [],
                        'firstLegLoadATA' => [],
                        'lastLegDischETA' => [],
                        'lastLegDischATA' => [],
                        'sendAgent' => [],
                        'sendingAgent' => [],
                        'recvAgent' => [],
                        'receivingAgent' => [],
                        'coLoaderNr' => [],
                        'registered' => [],
                        'agentRef' => [],
                        'carrierNr' => [],
                        'weight' => [],
                        'WU' => [],
                        'volume' => [],
                        'VU' => [],
                        'chargeable' => [],
                        'chargeQty' => [],
                        'CU' => [],
                        'chargeRate' => [],
                        'branch' => [],
                        'dept' => [],
                        'totalShipPacks' => [],
                        'carrierPrefixAir' => [],
                        'createUserInitialis' => [],
                        'refNumsGAT' => [],
                        'CreatedAt' => [],
                        'UpdatedAt' => [],
                    ],

                ],
            ],
        ],

        'Iliad' => [

            'tables' => [
                'Consols' => [
                    'UpdateKey' => 'ConsolId', 
                    'Columns' => [
                        'ConsolId' => ['uses' => 'TransportMaster.TransportMasterId'],
                        'type' => [],
                        'transport' => [],
                        'carrierScacCode' => [],
                        'master' => [],
                        'serviceLevel' => [],
                        'firstLoad' => [],
                        'firstLoadCountry' => [],
                        'lastDisch' => [],
                        'lastDischCtry' => [],
                        'flightVoyage' => [],
                        'ETD' => [],
                        'mainLegETD' => [],
                        'ATD' => [],
                        'ETA' => [],
                        'ATA' => [],
                        'firstLegLoa' => [],
                        'firstLegLoadCtry' => [],
                        'lastLegDisch' => [],
                        'lastLegDischCtry' => [],
                        'firstLegLoadETD' => [],
                        'firstLegLoadATD' => [],
                        'firstLegLoadATA' => [],
                        'lastLegDischETA' => [],
                        'lastLegDischATA' => [],
                        'sendAgent' => [],
                        'sendingAgent' => [],
                        'recvAgent' => [],
                        'receivingAgent' => [],
                        'coLoaderNr' => [],
                        'registered' => [],
                        'agentRef' => [],
                        'carrierNr' => [],
                        'weight' => [],
                        'WU' => [],
                        'volume' => [],
                        'VU' => [],
                        'chargeable' => [],
                        'chargeQty' => [],
                        'CU' => [],
                        'chargeRate' => [],
                        'branch' => [],
                        'dept' => [],
                        'totalShipPac' => [],
                        'carrierPrefixAir' => [],
                        'createUserInitialis' => [],
                        'refNumsGAT' => [],
                    ],
                ],
                
            ],

        ],


    ]

];
