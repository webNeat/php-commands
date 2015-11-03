<?php namespace MyCommands\Downloader;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Wn\Commands\BaseCommand;
use Stringy\Stringy;


class YoutubeDownloader extends BaseCommand {

    protected $signature = 'yt
        {url : The video or playlist URL.}
        {--type : Download a mp3 or mp4 (default mp4).}
    ';

    protected $description = 'Download from Youtube';

    protected $driver;
    
    public function execute()
    {
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::firefox());

        $url = $this->argument('url');

        if ($this->isPlayList($url)) {
            $this->downloadPlayList($url);
        } else {
            $this->downloadVideo($url);
        }

        $this->driver->close();
    }

    public function getVideoName($url)
    {
        $name = $this->driver
            ->get($url)
            ->getTitle();
        $name = trim(str_replace('YouTube', '', $name));
        $name = substr($name, 0, strlen($name) - 2);
        $name = $name . '.mp4';

        return $name;
    }

    protected function downloadVideo($url)
    {
        $name = $this->getVideoName($url);

        $url = 'http://convert2mp3.net/en/index.php?p=call&format=mp4&url=' . $url;

        $this->driver
             ->get($url)
             ->wait(60)
             ->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::linkText('Download')));
        
        $link = $this->driver->findElement(WebDriverBy::linkText('Download'))->getAttribute('href');

        $this->info($link);
        shell_exec('wget "' . $link . '" -O "' . $name . '"');
    }

    protected function isPlayList($url)
    {
        return Stringy::create($url)->startsWith('https://www.youtube.com/playlist?list=');
    }

    protected function downloadPlayList($url)
    {
        $videos = $this->getVideosOfPlayList($url);

        foreach ($videos as $video) {
            $this->downloadVideo($video);
        }
    }

    protected function getVideosOfPlayList($url)
    {
        $elements = $this->driver->get($url)->findElements(WebDriverBy::cssSelector('#pl-video-table a.pl-video-title-link'));

        return array_map(function($e) {
            return $e->getAttribute('href');
        }, $elements);
    }

}
