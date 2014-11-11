<?php

// Script d'import de table SQL
// TEMPORAIRE
// de http://stackoverflow.com/questions/19751354/how-to-import-sql-file-in-mysql-database-using-php

require('creds.php');

if (isset($_GET['KAMGF6QfHGl8GHypRCat'])) {
    
    // Name of the file
    $filename = 'events.sql';
    
    // Connect to MySQL server
    mysql_connect(__MYSQL_HOSTNAME__, __MYSQL_USERNAME__, __MYSQL_PASSWORD__) or die('Error connecting to MySQL server: ' . mysql_error());
    
    // Select database
    mysql_select_db(__MYSQL_DATABASE__) or die('Error selecting MySQL database: ' . mysql_error());
    
    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filename);
    
    // Loop through each line
    foreach ($lines as $line) {
        
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '') continue;
        
        // Add this line to the current segment
        $templine.= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            
            // Perform the query
            mysql_query($templine) or print ('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    echo "Tables imported successfully";
}
?>