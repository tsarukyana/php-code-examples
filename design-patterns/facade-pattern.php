<?php

/**
 * The Facade pattern is a structural design pattern that provides a simplified interface to a complex system of classes, making it easier to use.
 * Example:
 * Suppose you are building a music player application that has a complex system of classes to play different types of audio files such as mp3, wav, and flac.
 * You can implement the Facade pattern to simplify the interface of the system and provide an easy-to-use interface to play audio files.
 */

class AudioPlayerFacade
{
    private Mp3Player $mp3Player;
    private WavPlayer $wavPlayer;
    private FlacPlayer $flacPlayer;

    public function __construct()
    {
        $this->mp3Player = new Mp3Player();
        $this->wavPlayer = new WavPlayer();
        $this->flacPlayer = new FlacPlayer();
    }

    public function playMp3(string $filename): void
    {
        $this->mp3Player->loadFile($filename);
        $this->mp3Player->start();
    }

    public function playWav(string $filename): void
    {
        $this->wavPlayer->loadFile($filename);
        $this->wavPlayer->start();
    }

    public function playFlac(string $filename): void
    {
        $this->flacPlayer->loadFile($filename);
        $this->flacPlayer->start();
    }
}

// Audio player classes
class Mp3Player
{
    public function loadFile(string $filename): void
    {
        echo "Loading MP3 file: $filename\n";
    }

    public function start(): void
    {
        echo "Playing MP3 file\n";
    }
}

class WavPlayer
{
    public function loadFile(string $filename): void
    {
        echo "Loading WAV file: $filename\n";
    }

    public function start(): void
    {
        echo "Playing WAV file\n";
    }
}

class FlacPlayer
{
    public function loadFile(string $filename): void
    {
        echo "Loading FLAC file: $filename\n";
    }

    public function start(): void
    {
        echo "Playing FLAC file\n";
    }
}

// Usage example
$audioPlayer = new AudioPlayerFacade();
$audioPlayer->playMp3("song.mp3");
$audioPlayer->playWav("sound.wav");
$audioPlayer->playFlac("music.flac");



/**
 * In this example, we define an AudioPlayerFacade class that provides a simplified interface to a complex system of classes that can play different types of audio files.
 * The AudioPlayerFacade class has private properties $mp3Player, $wavPlayer, and $flacPlayer of type Mp3Player, WavPlayer, and FlacPlayer, respectively.
 * It also has public methods playMp3(), playWav(), and playFlac() that call the corresponding methods on the respective players.
 * Using the Facade pattern, we can hide the complex system of classes and provide a simplified interface to play different types of audio files.
 * We can create an instance of the AudioPlayerFacade class and use the playMp3(), playWav(), and playFlac() methods to play audio files
 * without worrying about the details of the underlying system of classes.
 */
