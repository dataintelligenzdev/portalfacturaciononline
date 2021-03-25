<?php
file_put_contents('peticiones.txt', serialize($_POST));

echo json_encode(['datos'=>'vamos']);