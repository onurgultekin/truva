<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['useragent'] = 'CodeIgniter';
$config['protocol'] = 'smtp';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['starttls'] = TRUE;
$config['smtp_crypto'] = 'tls';
$config['smtp_host'] = 'mail.justrenthere.com';
$config['smtp_user'] = 'no-reply@justrenthere.com';
$config['smtp_pass'] = 'JstRntHere21.!';
$config['smtp_port'] = 587; 
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;
?>