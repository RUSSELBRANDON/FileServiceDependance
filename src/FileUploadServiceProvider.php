<?php

namespace Russel\FileUpload;

use Illuminate\Support\ServiceProvider;

class FileUploadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(FileUploadService::class, function () {
            return new FileUploadService();
        });
    }

    public function boot()
    {
        //
    }
}