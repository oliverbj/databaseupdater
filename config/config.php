<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    'default' => [
        'database' => 'Iliad',
        'table' => 'Consols'
    ],
    
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
