<?php namespace Wn;

use Illuminate\Filesystem\Filesystem;
use Wn\IO\Parser\Json;


class Settings {

    /**
     * The filesystem handler.
     * 
     * @var Illuminate\Filesystem\Filesystem
     */
    private $fs;

    /**
     * Path to the settings file.
     *
     * @var string
     */
    private $path;

    /**
     * The settings data.
     * 
     * @var array
     */
    private $data;

    /**
     * Creates a settings instance based on a file.
     * 
     * @param  Illuminate\Filesystem\Filesystem $file
     * @return void
     */
    public function __construct(Filesystem $fs, $path)
    {
        $this->fs = $fs;
        $this->path = $path;

        $this->load();
    }

    /**
     * Loads data from the file.
     *
     * @return Wn\Settings
     */
    public function load()
    {
        $this->data = Json::parse($this->fs->get($this->path));

        return $this;
    }

    /**
     * Saves the settings to the file.
     * 
     * @return Wn\Settings
     */
    public function save()
    {
        $this->fs->put($this->path, Json::dump($this->data));

        return $this;
    }

    /**
     * Sets a setting value.
     * 
     * @param String $name
     * @param mixed $value
     * @return Wn\Settings
     */
    public function set($name, $value)
    {
        $this->data->$name = $value;

        return $this;
    }

    /**
     * Gets a setting value or null if not exists.
     * 
     * @param  String $name
     * @return mixed
     */
    public function get($name)
    {
        if($this->has($name)) {
            return $this->data->$name;
        }
        return null;
    }

    /**
     * Returns true if setting exists.
     * 
     * @param  string  $name
     * @return boolean
     */
    public function has($name)
    {
        return isset($this->data->$name);
    }

}
