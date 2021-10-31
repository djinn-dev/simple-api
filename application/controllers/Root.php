<?php


class Root extends Controller
{
    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET')
        {
            $this->_invalidMethod(['GET']);
        }
    }
}