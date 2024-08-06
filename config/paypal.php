<?php 

return [ 
    'client_id' => 'Adula5lUJCvmhFc4ullfAq6O_EX5b3WLYhDr8QGK5sHlEofDXnRf2KuMubcnWhPGFBqYDoRyf5FoQPrI',
	'secret' => 'EL0UuvRwHp6SSww91P2SCPIWmGb_P6m5zjRj-87fVujSzH8JkD-mmN1OIy3rpVVpMnEXSRGMDwTC0pA7',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];