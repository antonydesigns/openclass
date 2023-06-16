<?php

namespace Controllers;

class ProductController
{
    public function processRequest($method, $id)
    {

        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest($method, $id)
    {
        //..
    }

    private function processCollectionRequest($method)
    {
        //.. 
    }
}
