<?php

    /**
     * Created by PhpStorm.
     * User: godson
     * Date: 3/24/15
     * Time: 10:04
     */
    class factorial
    {

        private $base = 0;

        public function __construct( $num )
        {
            if (is_integer( $num )) {
                $this->base = $num;
            } else {
                throw new Exception( "Supported only integer values" );
            }
        }

        public function calculate( $formula = 'traditional' )
        {
            $value = 1;
            switch ($formula) {

                case 'stirling':
                    $value = $this->calculateStirling();
                    break;
                default:
                    $value = $this->calculateTraditional( $this->base );
                    break;
            }
            return sprintf( "%.0f", $value );
//            return number_format(round($value),0,'.','');
//            return $value;
        }

        private function calculateTraditional( $n )
        {
            return $n ? $n * $this->calculateTraditional( $n - 1 ) : 1;
        }

        private function calculateStirling()
        {
            return sqrt( 2 * M_PI * $this->base ) * ( pow( ( $this->base / M_E ), $this->base ) ) * (
                1
                + ( 1 / ( 12 * $this->base ) )
                + ( 1 / ( 288 * pow( $this->base, 2 ) ) )
                - ( 139 / ( 51840 * pow( $this->base, 3 ) ) )
                - ( 571 / ( 2488320 * pow( $this->base, 4 ) ) )
                + ( 163879 / ( 209018880 * pow( $this->base, 5 ) ) )
                + ( 5246819 / ( 75246796800 * pow( $this->base, 6 ) ) )
                + pow( $this->base, - 7 )
            );

        }
    }