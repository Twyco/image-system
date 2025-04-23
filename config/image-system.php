<?php

return [
    'owner_model' => env('IMAGE_OWNER_MODEL', \App\Models\User::class),
    'disk' => env('IMAGE_STORAGE_DISK', 'public'),
];