<?php


/**
 * Class Controller Abstract
 *
 * Define base system setup for controller classes.
 */
abstract class Controller Extends Core
{
    protected function _outputJson($data = [])
    {
        header('Content-Type: application/json; charset=utf-8');
        $data['timestamp'] = time();
        $data['path'] = $_SERVER['REQUEST_URI'];
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }

    protected function _throwError($status, $error, $message)
    {
        $data = [
            'status' => $status,
            'error' => $error,
            'message' => $message,
        ];
        $this->_outputJson($data);
    }

    protected function _invalidMethod($methods)
    {
        $message = "Available methods: " . implode(',', $methods);
        $this->_throwError(405, 'Method Not Allowed', $message);
    }
}