<?php
foreach (scandir('./parsedFiles') as $filename){
    if ($filename!== '.' && $filename!=='..' && $filename!=='.gitkeep'){
        echo "<a href='/?openFilename=$filename'>$filename<br></a>";
    }
}