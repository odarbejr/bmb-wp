<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readme</title>
</head>
<body>
    
    <h2>Install WordPress</h2>
    <ol>
        <li>Download and unzip the WordPress package if you haven’t already.</li>
        <li>Create a database for WordPress on your web server, as well as a MySQL </li>
        <li>(Optional) Find and rename wp-config-sample.php to wp-config.php, then edit the file (see Editing wp-config.php) and add your database information.
            Note: If you are not comfortable with renaming files, step 3 is optional and you can skip it as the install program will create the wp-config.php file for you.</li>
        <li>Upload the WordPress files to the desired location on your web server:
            If you want to integrate WordPress into the root of your domain (e.g. http://example.com/), move or upload all contents of the unzipped WordPress directory (excluding the WordPress directory itself) into the root directory of your web server.</li>    
        <li>Run the WordPress installation script by accessing the URL in a web browser. This should be the URL where you uploaded the WordPress files.
            If you installed WordPress in the root directory, you should visit: http://example.com/
            If you installed WordPress in its own subdirectory called blog, for example, you should visit: http://localhost/bmb-wp/</li>    
      </ol> 


      <h2>Credential db</h2>

    <ol>
        <li>open wp-config.php</li>
        <li>username: admin</li>
        <li>password: admin</li><br>
        <li>http://localhost/bmb-wp/wp-login.php</li>
        <li>visit site: http://localhost/bmb-wp/</li>
    </ol> 

    <h2>Themes source code </h2>

    <ol>
        <li>Open folder</li>
        <li>wp-content>themes>bmb</li>
    </ol> 
</body>
</html>
