<?php


class Root extends Controller
{
	public function index()
	{
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $this->__indexGet();
                break;
            default:
                $this->_invalidMethod(['GET']);
                break;
        }
	}

    private function __indexGet()
    {
        $this->_outputJson();
    }
}