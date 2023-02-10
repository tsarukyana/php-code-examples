<?php

/**
 * The Observer pattern is a behavioral design pattern that defines a one-to-many dependency between objects so that when one object changes state, all its dependents are notified and updated automatically.
 * This way, the observer objects are notified whenever the subject they are observing changes state, without having to tightly couple the two objects.
 * Example:
 */

interface Subject
{
    public function attach(Observer $observer);

    public function detach(Observer $observer);

    public function notify();
}

interface Observer
{
    public function update(Subject $subject);
}

class WeatherData implements Subject
{
    private array $observers = [];
    private float $temperature;
    private float $humidity;
    private float $pressure;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     * @return void
     */
    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->notify();
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }
}

class CurrentConditionsDisplay implements Observer
{
    private float $temperature;
    private float $humidity;
    private WeatherData $weatherData;

    public function __construct(WeatherData $weatherData)
    {
        $this->weatherData = $weatherData;
        $weatherData->attach($this);
    }

    public function update(Subject $subject)
    {
        $this->temperature = $subject->getTemperature();
        $this->humidity = $subject->getHumidity();
        $this->display();
    }

    public function display()
    {
        echo "Current conditions: " . $this->temperature . "F degrees and " . $this->humidity . "% humidity\n";
    }
}

$weatherData = new WeatherData();
$currentDisplay = new CurrentConditionsDisplay($weatherData);

$weatherData->setMeasurements(80, 65, 30.4);
$weatherData->setMeasurements(82, 70, 29.2);
$weatherData->setMeasurements(78, 90, 29.2);


/**
 * In this example, the WeatherData class is the subject and the CurrentConditionsDisplay class is the observer.
 * The observer is notified whenever the subject they are observing changes state.
 * This way, the observer objects are notified whenever the subject they are observing changes state, without having to tightly couple the two objects
 */
