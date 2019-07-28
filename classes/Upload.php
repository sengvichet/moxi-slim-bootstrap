<?php
/**
 * This file contains a file upload class.
 *
 * PHP version 7.1
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://lamp-dev.com
 */
namespace Classes;

use Slim\Http\UploadedFile;

/**
 *  File upload class
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class Upload
{
    /**
     * Config settings
     * @var array
     */
    private $settings;

    /**
     * Initialises settings
     *
     * @param array $settings service settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Moves the uploaded file to the upload directory and assigns it a unique name
     * to avoid overwriting an existing uploaded file.
     *
     * @param UploadedFile $uploadedFile file uploaded file to move
     * @param string       $directory    directory to which the file is moved
     *
     * @return string filename of moved file
     */
    public function moveUploadedFile(UploadedFile $uploadedFile, $directory = null, $preserveFilename = false)
    {
        if (empty($directory)) {
            $directory = $this->settings->get()['paths']['default'];
        }
        if (!realpath($directory)) {
            if (!mkdir($directory, 0777, true)) {
                return false;
            }
        }

        if ($preserveFilename) {
            $filename = $uploadedFile->getClientFilename();
        } else {
            $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
            $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
            $filename = sprintf('%s.%0.8s', $basename, $extension);
        }
        if (realpath($directory . $filename)) {
            return false;
        }
        $uploadedFile->moveTo($directory . $filename);

        return $filename;
    }
}
