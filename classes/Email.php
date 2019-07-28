<?php
/**
 * This file contains a class using PHPMailer to send emails.
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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * This class is a wrapper of PHPMailer class.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class Email
{
    /**
     * PHPMailer instance
     */
    protected $mailer;
    /**
     * Monolog service instance
     */
    protected $logger;
    /**
     * Config settings array
     */
    protected $settings;

    /**
     * Initializes PHPMailer.
     *
     * @param array  $settings email config settings
     * @param object $logger   logger service
     *
     * @return void
     */
    public function __construct(array $settings, $logger)
    {
        $this->settings = $settings;
        $this->logger = $logger;

        $this->mailer = new PHPMailer(true);
        $this->configure();
    }

    /**
     * Sends email.
     *
     * @param array $data ['emails' => ['email@example.com' => 'name'],
     *                    'html' => '', 'text' => '',
     *                    'subject' => '', 'attachments' => []]
     *
     * @return bool
     */
    public function sendEmail(array $data)
    {
        if (empty($data['emails'])) {
            $this->logger->addError(__CLASS__, ['empty emails']);
            return false;
        }

        try {
            if (!$this->setHeader($data['emails'])) {
                $this->logger->addError(__CLASS__, ['not set header']);
                return false;
            }

            $this->setContents($data);
        
            $sent = $this->mailer->send();
            $this->logger->addError(__CLASS__, ['sent'=> $sent]);
            return $sent;
        } catch (Exception $e) {
            $this->logger->addError(__CLASS__, [$e, $this->mailer->ErrorInfo]);
            return false;
        }
    }

    /**
     * Refreshes mailer object
     *
     * @return void
     */
    public function refresh()
    {
        $this->mailer = new PHPMailer(true);
        $this->configure();
    }

    /**
     * Set mailer options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mailer->SMTPDebug = ($this->settings['smtp_debug']) ? 2 : 0;
        if (!$this->settings['smtp_on']) {
            $this->logger->addError(__CLASS__, ['smtp'=> $this->settings['smtp_on']]);
            return;
        }

        $this->mailer->isSMTP();
        $this->mailer->Host = $this->settings['smtp_host'];
        $this->mailer->SMTPAuth = $this->settings['smtp_auth'];
        $this->mailer->Username = $this->settings['smtp_user'];
        $this->mailer->Password = $this->settings['smtp_pass'];
        $this->mailer->SMTPSecure = $this->settings['smtp_secure'];
        $this->mailer->Port = $this->settings['smtp_port'];
        $this->mailer->CharSet = $this->settings['charset'];
        $this->logger->addInfo(__CLASS__, [$this->mailer]);
    }

    /**
     * Set email from and to addresses.
     *
     * @param array $emails to addresses
     *
     * @return bool
     */
    protected function setHeader(array $emails)
    {
        $isSet = false;

        $this->mailer->setFrom(
            $this->settings['from']['email'],
            $this->settings['from']['name']
        );
        foreach ($emails as $email => $name) {
            $this->logger->addInfo(__CLASS__, ['email' => $email]);
            if ($email) {
                $this->mailer->addAddress($email, $name);
                $isSet = true;
            }
        }

        return $isSet;
    }

    /**
     * Set attachments.
     *
     * @param array $attachments array of pathes to attachment
     *
     * @return bool
     */
    protected function setAttachments(array $attachments)
    {
        $isSet = false;

        foreach ($attachments as $attachment) {
            if (real_path($attachment)) {
                $this->mailer->addAttachment($attachment);
                $isSet = true;
            }
        }

        return $isSet;
    }

    /**
     * Set contents.
     *
     * @param array $data array with contents
     *
     * @return void
     */
    protected function setContents(array $data)
    {
        $this->mailer->isHTML(!empty($data['html']));
        $this->mailer->Subject = (!empty($data['subject'])) ? $data['subject'] : '';
        $this->mailer->AltBody = (!empty($data['text'])) ? $data['text'] : '';
        $this->mailer->Body    = (!empty($data['html'])) ? $data['html'] : $this->mailer->AltBody;

        if (!empty($data['attachments'])) {
            $this->setAttachments($data['attachments']);
        }
    }
}
