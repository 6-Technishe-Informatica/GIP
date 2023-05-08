<?php

if ($_POST["message"]) { // kijken of er een bericht is

    $to      = 'devloo.prive@gmail.com'; // email adres van de ontvanger
    $subject = $_POST['name'] . 'sent you a message via your contact form'; // onderwerp van de mail
    $message = $_POST["message"]; // bericht
    $headers = 'From: ' . $_POST['email'] . "\r\n" . // email adres van de verzender
    'Reply-To: ' . $_POST['email'] . "\r\n" . // email adres van de verzender
    'X-Mailer: PHP/' . phpversion(); // versie van PHP

    echo "Deze code werkt niet, er mist een mail server. De code is wel correct."; 

    // change php.ini file to enable mail server with code
    // [mail function]
    // ; For Win32 only.
    // ; http://php.net/smtp
    // SMTP = smtp.gmail.com
    // ; http://php.net/smtp-port
    // smtp_port = 587
    // ; For Win32 only.
    // ; http://php.net/sendmail-from
    // sendmail_from = devloo.prive@gmail
    // ; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").
    // ; http://php.net/sendmail-path
    // sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
    

    mail($to, $subject, $message, $headers); // mail verzenden
}
