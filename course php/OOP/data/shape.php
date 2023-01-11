<?php
namespace data {

    class shape
    {
        public function getCouner()
        {
            return 0;
        }
    }
    class rectangle extends shape {
        public function getCouner()
        {
            return 4;
        }
        public function getparentCorner(){
            return parent::getCouner();
        }
    }
}