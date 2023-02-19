<?php

/**
 * The Adapter pattern is a structural design pattern that allows classes with incompatible interfaces to work together
 * by creating a new class (the adapter) that acts as a middleman between the two incompatible classes.
 * Example:
 * Suppose we have an existing Book class with a getTitle() method,
 * but we need to use it in our new code which expects the name to be returned instead of the title.
 * We can create an adapter class BookAdapter that adapts the Book class to meet the new requirements.
 */

class Book
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

interface BookInterface
{
    public function getName(): string;
}

class BookAdapter implements BookInterface
{
    private Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getName(): string
    {
        return $this->book->getTitle();
    }
}

// Usage example
$book = new Book("Design Patterns: Elements of Reusable Object-Oriented Software");
$bookAdapter = new BookAdapter($book);
echo $bookAdapter->getName(); // outputs "Design Patterns: Elements of Reusable Object-Oriented Software"


/**
 * In this example, the Book class has a getTitle() method that returns the book's title.
 * We want to use this class in a new code that expects a BookInterface with a getName() method that returns the book's name.
 * Instead of modifying the existing Book class, we create a BookAdapter class that implements the BookInterface and adapts the Book class by calling its getTitle() method inside its getName() method.
 * Now, the BookAdapter class can be used seamlessly in the new code.
 */
