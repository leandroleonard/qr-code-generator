<?php
    namespace src;

    use chillerlan\QRCode\QRCode;

    class Generator
    {
        public string $url;
        public QRCode $generator;
        
        public function __construct(string $url)
        {
            $this->url = $url;
            $this->generator = new QRCode();
        }

        public function get_image(): string
        {
            return $this->generator->render($this->url);
        }
    }