<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Mailgun\Mailgun;

class Email extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function send()
    {
       

        # Instantiate the client.
        $mgClient = new Mailgun('key-d6f9239c7f19a6587509cc86cfdc727d');
        $domain = "sandboxb3198e55080b441f967c39ceff6a7fa7.mailgun.org";
        
        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => 'Excited User <postmaster@sandboxb3198e55080b441f967c39ceff6a7fa7.mailgun.org>',
            'to'      => 'Baz <christopher.caplan@gmail.com>',
            'subject' => 'Hello',
            'text'    => 'Testing some Mailgun awesomness!'
        ));

    }
}
