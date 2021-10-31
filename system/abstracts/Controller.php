<?php


/**
 * Class Controller Abstract
 *
 * Define base system setup for controller classes.
 */
abstract class Controller Extends Core
{
    /**
     * @var array Handles json output
     */
    public array $data = [];

    /**
     * Controller de-constructor.
     *
     * Output JSON at the end
     */
    public function __destruct()
    {
        // CORS
        header('Access-Control-Allow-Origin: *');
        // header('Vary: Origin');
        header('Access-Control-Allow-Methods: *');
        header("Access-Control-Allow-Headers: X-Requested-With");
        // Output Format
        header('Content-Type: application/json');

        // Standard Output
        $this->data['timestamp'] = time();
        $this->data['path'] = $_SERVER['REQUEST_URI'];

        echo json_encode($this->data, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Handle RESTful error message
     *
     * @param int $status
     * @param string $error
     * @param string $message
     */
    protected function _throwError(int $status, string $error, string $message)
    {
        $this->data['status'] = $status;
        $this->data['error'] = $error;
        $this->data['message'] = $message;
    }

    /**
     * Generate error response for invalid methods
     *
     * @param array $methods
     */
    protected function _invalidMethod(array $methods)
    {
        $message = "Available methods: " . implode(',', $methods);
        $this->_throwError(405, 'Method Not Allowed', $message);
    }
}