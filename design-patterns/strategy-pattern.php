<?php

/**
 * The Strategy pattern is a behavioral design pattern that allows you to select an algorithm at runtime by defining a family of algorithms,
 * encapsulating each one, and making them interchangeable.
 * Example:
 * Suppose you are building a shipping application that needs to calculate the cost of shipping based on different algorithms,
 * such as weight-based shipping, volume-based shipping, or distance-based shipping.
 * You can implement the Strategy pattern to encapsulate each shipping algorithm into a separate class and allow the application to select the algorithm at runtime.
 */

interface ShippingStrategy
{
    public function calculateCost(float $weight, float $volume, float $distance): float;
}

class WeightBasedShipping implements ShippingStrategy
{
    public function calculateCost(float $weight, float $volume, float $distance): float
    {
        return $weight * 0.5;
    }
}

class VolumeBasedShipping implements ShippingStrategy
{
    public function calculateCost(float $weight, float $volume, float $distance): float
    {
        return $volume * 0.1;
    }
}

class DistanceBasedShipping implements ShippingStrategy
{
    public function calculateCost(float $weight, float $volume, float $distance): float
    {
        return $distance * 0.2;
    }
}

class ShippingCalculator
{
    private $strategy;

    public function __construct(ShippingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(ShippingStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function calculateShippingCost(float $weight, float $volume, float $distance): float
    {
        return $this->strategy->calculateCost($weight, $volume, $distance);
    }
}

// Usage example
$calculator = new ShippingCalculator(new WeightBasedShipping());
echo $calculator->calculateShippingCost(10, 0, 0) . "\n"; // outputs 5
$calculator->setStrategy(new VolumeBasedShipping());
echo $calculator->calculateShippingCost(0, 5, 0) . "\n"; // outputs 0.5
$calculator->setStrategy(new DistanceBasedShipping());
echo $calculator->calculateShippingCost(0, 0, 100) . "\n"; // outputs 20


/**
 * In this example, we define an interface ShippingStrategy that requires a calculateCost() method.
 * We implement three different shipping strategies, each with its own implementation of the calculateCost() method,
 * as separate classes WeightBasedShipping, VolumeBasedShipping, and DistanceBasedShipping.
 * We then create a ShippingCalculator class that has a property $strategy of type ShippingStrategy and a calculateShippingCost() method that delegates the calculation to the current strategy.
 * Finally, we create an instance of the ShippingCalculator class and pass it an instance of the WeightBasedShipping class.
 * We use the calculateShippingCost() method to calculate the cost of shipping based on the weight.
 * Then, we change the strategy to the VolumeBasedShipping and calculate the cost of shipping based on the volume, and so on.
 * This way, we can select the appropriate algorithm at runtime based on our needs.
 */
