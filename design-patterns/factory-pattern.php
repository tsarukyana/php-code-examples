<?php

/**
 * The Factory pattern is a creational design pattern
 * that provides a way to create objects without specifying the exact class of object that will be created.
 * Instead, a factory class handles the creation of objects and returns an instance of an object from a common interface.
 * Example:
 */

interface Shape
{
    public function draw();
}

class Circle implements Shape
{
    public function draw()
    {
        // Draw a circle
    }
}

class Rectangle implements Shape
{
    public function draw()
    {
        // Draw a rectangle
    }
}

class ShapeFactory
{
    public function getShape(string $shapeType): Shape
    {
        if ($shapeType == 'circle') {
            return new Circle();
        } elseif ($shapeType == 'rectangle') {
            return new Rectangle();
        }

        throw new InvalidArgumentException("Invalid shape type");
    }
}

$shapeFactory = new ShapeFactory();
$circle = $shapeFactory->getShape('circle');
$circle->draw();

$rectangle = $shapeFactory->getShape('rectangle');
$rectangle->draw();

/**
 * In this example, the ShapeFactory class provides a way to create Shape objects without specifying the exact class of the object that will be created.
 * The client code uses the factory to create the objects and does not need to know the implementation details of the concrete classes.
 */
