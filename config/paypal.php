<?php
return array(
    // set your paypal credential
    'client_id' => 'AW9SZnG751H7RbrV2Fz8HEOdX_InruljIUyTwG9278yQBUN0iG_QHVzncbffQkftVo7FCqoU62OeSNyT',
    'secret' => 'EAtw102tDqYXYGV2JryZfygpH4I0Dj0VZBfkPxxnDWjWWIUyBvg0A2RJXqrxxfVZvQ-rvb8qrk6OMw38',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);