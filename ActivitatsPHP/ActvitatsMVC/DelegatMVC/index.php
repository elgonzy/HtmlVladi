<?php 
    
    use \LoginView;

    $htmlHead = "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Selector delegat</title>
                    </head>
                    <body>"; 

    $htmlFooter = " </body>
                    </html>";

    $htmlBody = "";
    
    
    $LoginView = new LoginView();

    $htmlBody = $LoginView -> getHtml();


    echo $htmlHead . $htmlBody . $htmlFooter;
?>