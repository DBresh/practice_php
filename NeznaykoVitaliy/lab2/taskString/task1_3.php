<?php 
$filePath = "D: \ WebServers \ home \ testsite \ www \ myfile.txt";
$nameFile = pathinfo( $filePath, PATHINFO_FILENAME );
$exp = pathinfo( $filePath, PATHINFO_EXTENSION );
echo "Шлях до файлу: ". $filePath;
echo "<br>Назва файлу без розширення: " . $nameFile;
echo "<br>Розширення файлу: " . $exp;