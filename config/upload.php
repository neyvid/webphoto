<?php

return[
    'path'=>public_path('photo/client/upload'),
    'url'=>url('photo/client/upload'),
    'whitelist'=>[
        'image/jpeg',
        'image/png',
        'image/gif'
    ]
]

?>