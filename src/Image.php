<?php
    namespace src;
    class Image
    {
        public string $name;
        public string $path;
        public string $base64Image;
        public string $default_name = 'leandroventura-qr-codegenerator';
        public string $default_format = '.png';

        public function __construct(string $base64, string $url = '')
        {
            $this->path = __DIR__ . DIRECTORY_SEPARATOR . 'images/';
            $this->name = $this->sanitize_url($url);
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

        public function sanitize_url(string $url)
        {
            if($url != ''){
                $url = str_replace('https://', '', $url);
                $url = str_replace('http://', '', $url);
                $url = str_replace('/', '0', $url);
                return $url . $this->default_format;
            }

            return $this->default_name . $this->default_format;
        }

        public function getPath(): string
        {
            return $this->path;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getFullPath(): string
        {
            return $this->path . $this->name;
        }
    }