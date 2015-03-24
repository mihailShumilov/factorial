<?php
    /**
     * Created by PhpStorm.
     * User: godson
     * Date: 3/24/15
     * Time: 10:12
     */

    require_once( dirname( __FILE__ ) . '/factorial.class.php' );

    for ($i = 1; $i <= 1000; $i ++) {
        echo "Calculate factorial for {$i}" . PHP_EOL;
        $factorial = new factorial( $i );
        echo "Traditional result" . PHP_EOL;
        var_dump( $factorial->calculate() );
        echo "Stirling result" . PHP_EOL;
        var_dump( $factorial->calculate( 'stirling' ) );
    }
