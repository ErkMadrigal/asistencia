<?php

namespace App\Libraries;


use CodeIgniter\HTTP\RequestInterface;

class Crud_email 
{

    private $body;
    private $tema;

    function __construct()
    {
        
    }

    

    public function message($body, $tema){
        $this->body = $body;
        $this->tema = $tema;

        $out ="<html>
            <head>
                <meta http-equiv='Content-Type'  content='text/html charset=UTF-8' />
            </head>
            <body>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                    <td style='background-color: #ffb000; padding-top:25px; padding-bottom:25px;'>
                    </td>
                </tr>
                </table>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                <td style='background-color: #434343; padding-top:25px; padding-bottom:25px; font-family: Arial;color:#fff; font-size:30px;'>
                    <center>".
                        $this->tema
                    ."</center>
                </td>
                </tr>
                </table>".
                    $this->body
                ."<table width='100%' border='0' cellspacing='0' cellpadding='0' style='margin-top:15px;'>
                <tr>
                <td style='background-color:#434343; padding-top:20px; padding-bottom:20px; font-family: Arial;color:#fff; font-size:15px;'>
                <center>
                    ".lang('Layout.emailFooter')."
                </center>
                </td>
                </tr>
                </table>
            </body>
        </html>"; 

        return $out;
    }

    

    
}
