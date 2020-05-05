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

                        'consolID' => ['uses' => 'TransportMaster.TransportMasterId', 'default' => ''],
                        'type' => ['uses' => 'TransportMaster.TransportMasterType', 'default' => ''],
                        'transport' => ['uses' => 'Header.Source.Division', 'Default' => ''],
                        //'carrierScacCode' => ['default' => ''],
                        'master' => ['uses' => 'TransportMaster.TransportMasterReferences[Reference(::Type=@)]', 'Index' => 'MasterBill'],
                        'serviceLevel' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.ShipmentReferences[Reference(::Type=@)]', 'Index' => 'ServiceLevel', 'default' => ''],
                        'firstLoad' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Loading', 'default' => ''],
                        'firstLoadCountry' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Loading', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 2]],
                        'lastDisch' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Unloading', 'default' => ''],
                        'lastDischCtry' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Unloading', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 2]],
                        'flightVoyage' => ['uses' => 'TransportMaster.TransportStages.Stage.MeansOfTransport.Id', 'default' => ''],
                        'ETD' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ScheduledDeparture', 'default' => null],
                        'mainLegETD' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ScheduledDeparture', 'default' => null],
                        'ATD' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ActualDeparture', 'default' => null],
                        'ETA' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ScheduledArrival', 'default' => null],
                        'ATA' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ActualArrival', 'default' => null],

                        'firstLegLoad' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Loading', 'default' => ''],
                        'firstLegLoadCtry' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Loading', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 2]],
                        'lastLegDisch' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Unloading', 'default' => ''],
                        'lastLegDischCtry' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Unloading', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 2]],

                        'firstLegLoadETD' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ScheduledDeparture', 'default' => null],
                        'firstLegLoadATD' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ActualDeparture', 'default' => '', 'Rule' => 'currentTime'],
                        'firstLegLoadATA' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ActualArrival', 'default' => '', 'Rule' => 'currentTime'],
                        'lastLegDischETA' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ScheduledArrival', 'default' => null],
                        'lastLegDischATA' => ['uses' => 'TransportMaster.TransportStages.Stage[Dates.Date(::Type=DateTime)]', 'Index' => 'ActualArrival', 'default' => '', 'Rule' => 'currentTime'],
                        'sendAgent' => ['uses' => 'TransportMaster.Parties[Party(::Role=Id)]', 'Index' => 'SF', 'default' => ''],
                        //'sendingAgent' => [],
                        'recvAgent' => ['uses' => 'TransportMaster.Parties[Party(::Role=Id)]', 'Index' => 'NI', 'default' => ''],
                        //'receivingAgent' => [],
                        'coLoaderNr' => ['uses' => 'TransportMaster.Parties[Party(::Role=Id)]', 'Index' => 'HS', 'default' => ''],
                        'registered' => ['uses' => 'TransportMaster.CreationDateTime'],
                        //'agentRef' => [''],
                        'carrierNr' => ['uses' => 'TransportMaster.Parties[Party(::Role=Id)]', 'Index' => 'CA', 'default' => ''],
                        'weight' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.GrossWeight'],
                        'WU' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.GrossWeight::Uom'],
                        'volume' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.Volume'],
                        'VU' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.Volume::Uom'],
                        'chargeable' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.ChargeableWeight'],
                        'chargeQty' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.ChargeableWeight'],
                        'CU' => ['uses' => 'TransportMaster.ShipmentInstructions.ShipmentInstruction.ShipmentDetails.ChargeableWeight::Uom'],
                        'chargeRate' => ['default' => 0.00],
                        //'branch' => [],
                        //'dept' => [],
                        'totalShipPacks' => ['uses' => 'TransportMaster.NumberOfPackages'],
                        'carrierPrefixAir' => ['uses' => 'TransportMaster.TransportMasterReferences[Reference(::Type=@)]', 'Index' => 'MasterBill', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 3]],
                        //'createUserInitialis' => [],
                        'refNumsGAT' => ['uses' => 'TransportMaster.TransportMasterReferences[Reference(::Type=@)]', 'Index' => 'GAT', 'default' => null],
                        'CreatedAt' => ['Rule' => 'currentTime'],
                        'UpdatedAt' => ['Rule' => 'currentTime'],
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
