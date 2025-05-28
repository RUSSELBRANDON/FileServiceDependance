<?php

namespace Russel\FileUpload\Enums;

enum FilePath: string
{
    case PROFILE_IMAGES = 'profile_images';
    case DOCUMENTS = 'documents';
    case BLOG_IMAGES = 'blog/images';
    case USER_FILES = 'users/files';

    public function getStoragePath(): string
    {
        return $this->value;
    }
}