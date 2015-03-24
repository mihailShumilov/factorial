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
            if (filter_var( $num, FILTER_VALIDATE_INT ) && $num > 0) {
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
            return $value;
        }

        private function calculateTraditional( $n )
        {
            return $n ? bcmul( $n, $this->calculateTraditional( $n - 1 ) ) : 1;
        }

        private function calculateStirling()
        {
            return bcmul( bcmul( sqrt( bcmul( bcmul( 2, M_PI ), $this->base ) ),
                ( bcpow( ( $this->base / M_E ), $this->base ) ) ), (
                1
                + bcdiv( 1, ( bcmul( 12, $this->base ) ) )
                + bcdiv( 1, ( bcmul( 288, bcpow( $this->base, 2 ) ) ) )
                - bcdiv( 139, ( bcmul( 51840, bcpow( $this->base, 3 ) ) ) )
                - bcdiv( 571, ( bcmul( 2488320, bcpow( $this->base, 4 ) ) ) )
                + bcdiv( 163879, ( bcmul( 209018880, bcpow( $this->base, 5 ) ) ) )
                + bcdiv( 5246819, ( bcmul( 75246796800, bcpow( $this->base, 6 ) ) ) )
                + bcpow( $this->base, - 7 )
            ) );

        }
    }