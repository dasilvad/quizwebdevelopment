<?php
header('Content-type: text/json');
header('Content-Disposition: attachment; filename='.basename('file.json'));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: '.filesize('file.json'));
readfile('file.json');
