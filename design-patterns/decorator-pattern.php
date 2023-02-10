<?php

/**
 * The Decorator pattern is a structural design pattern that allows behavior to be added to an individual object,
 * either statically or dynamically, without affecting the behavior of other objects from the same class.
 * This is done by using composition rather than inheritance to extend an object's behavior.
 * Example:
 */

interface Pizza
{
    public function getDescription();

    public function cost();
}

class PlainPizza implements Pizza
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return "Thin dough";
    }

    /**
     * @return float
     */
    public function cost(): float
    {
        return 4.00;
    }
}

abstract class ToppingDecorator implements Pizza
{
    protected Pizza $tempPizza;

    /**
     * @param Pizza $newPizza
     */
    public function __construct(Pizza $newPizza)
    {
        $this->tempPizza = $newPizza;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->tempPizza->getDescription();
    }

    /**
     * @return float
     */
    public function cost(): float
    {
        return $this->tempPizza->cost();
    }
}

class Mozzarella extends ToppingDecorator
{
    public function __construct(Pizza $newPizza)
    {
        parent::__construct($newPizza);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->tempPizza->getDescription() . ", mozzarella";
    }

    /**
     * @return float
     */
    public function cost(): float
    {
        return $this->tempPizza->cost() + 0.50;
    }
}

class TomatoSauce extends ToppingDecorator
{
    public function __construct(Pizza $newPizza)
    {
        parent::__construct($newPizza);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->tempPizza->getDescription() . ", tomato sauce";
    }

    /**
     * @return float
     */
    public function cost(): float
    {
        return $this->tempPizza->cost() + 0.35;
    }
}

$basicPizza = new PlainPizza();
echo "Ingredients: " . $basicPizza->getDescription() . PHP_EOL;
echo "Price: $" . $basicPizza->cost() . PHP_EOL;

$basicPizza = new Mozzarella($basicPizza);
echo "Ingredients: " . $basicPizza->getDescription() . PHP_EOL;
echo "Price: $" . $basicPizza->cost() . PHP_EOL;

$basicPizza = new TomatoSauce($basicPizza);
echo "Ingredients: " . $basicPizza->getDescription() . PHP_EOL;
echo "Price: $" . $basicPizza->cost() . PHP_EOL;

/**
 * In this example, the PlainPizza class is the base object, the Mozzarella and TomatoSauce classes are the decorators,
 * and the ToppingDecorator class is the abstract decorator class.
 * The decorators are added to the base object to dynamically add or override behavior to an individual object,
 * without affecting the behavior of other objects from the same class.
 */
