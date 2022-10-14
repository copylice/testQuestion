<?php
foreach (scandir('./parsedFiles') as $filename){
    if ($filename!== '.' && $filename!=='..'){
        echo "<a href='/?openFilename=$filename'>$filename<br></a>";
    }
}