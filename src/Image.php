<?php
    namespace src;
    class Image
    {
        public string $name;
        public string $path;
        public string $base64Image;
        public string $default_name = 'leandroventura-qr-codegenerator';
        public string $default_format = '.png';

        public function __construct(string $base64, string $url = null)
        {
            $this->path = __DIR__ . DIRECTORY_SEPARATOR . 'images/';
            $this->name = ($this->sanitize_url($url) ?? $this->default_name) . $this->default_format;
            $this->base64Image = $this->sanitize_base64($base64);
        }


        public function save()
        {
            $image = base64_decode($this->base64Image);

            if(file_put_contents($this->path . $this->name, $image)) return true;

            return false;

        }

        public function sanitize_base64(string $base64): string
        {
            return str_replace('data:image/png;base64,', '', $base64);
        }

        public function sanitize_url(string $url): string
        {
            $url = str_replace('https://', '', $url);
            $url = str_replace('http://', '', $url);
            $url = str_replace('/', '0', $url);
            return $url;
        }
    }