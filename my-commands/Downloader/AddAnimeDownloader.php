<?php namespace MyCommands\Downloader;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Symfony\Component\DomCrawler\Crawler;
use Facebook\WebDriver\WebDriverBy;
use Wn\Commands\BaseCommand;
use Stringy\Stringy;


class AddAnimeDownloader extends BaseCommand {

    protected $signature = 'aa
        {url : The episode link.}
        {--all : Download till the last episode.}
    ';

    protected $description = 'Download from AddAnime';

    protected $html;

    public function execute()
    {
        $this->load($this->argument('url'));

        $this->downloadVideo($this->option('all'));
    }

    protected function load($url)
    {
        $this->html = new Crawler;
        $this->html->addHtmlContent($this->fetch($url));
    }

    public function getVideoName()
    {
        $name = $this->html->filter('title')->text();
        $name = trim($name);
        $name = $name . '.mp4';

        return $name;
    }

    protected function downloadVideo($next)
    {

        $name = $this->getVideoName();

        $this->info($name);

        $link = $this->html
            ->filter('.puertoHomeBlock > ul.nav-pills > li > a')
            ->attr('href');

        shell_exec('wget "'.$link.'" -O "'.$name.'"');

        if ($next) {
            $url = $this->html
                ->filter('.tabbable > .lft > a.btn-danger')
                ->attr('href');
            $url = 'http://add-anime.net' . $url;
            
            $this->load($url);

            $this->downloadVideo($next);
        }

    }

    protected function fetch($url)
    {
        return file_get_contents($url);
    }

}
