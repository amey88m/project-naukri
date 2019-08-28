<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body { font-family: sans-serif; color: #000; font-weight: 200;}
    section { position: relative; width: calc(100% - 200px); margin: 0 auto; background-color: yellow;
    padding: 2rem 1rem; }
    a { color: blue; display: block; text-decoration: underline; margin-top: 2rem}
    </style>
</head>
<body>

<section>
    <center>
        <b> please verifiy you email address first, so then only you can able to reset your password.<b>
        Email address :  <?php print $_SESSION['n'] ?> <br>
        <a href='https://www.google.com/gmail/' target='_blank'> login to your gmail account </a>
        <a href='http://127.0.0.1/project_naukri/forget-password'>Back to login page</a>
    </center>
</section>    
    
</body>
</html>