<?php

error_reporting(E_ALL);
ini_set('display_error', 1);


class Post{

    // Post Properties.
    public $id;
    public $category_id;
    public $title;
    public $description;
    public $create_at;

    // Database Data.

    private $connection;
    private $table = 'posts';

    public function __construct($db)
    {
        $this->connection = $db;
    }

    
    // Method to read all the saved posts from database.

    public function readPosts()
    {
        // Query for reading posts from table.

        $query = 'SELECT 
            category.name as category,
            posts.id,
            posts.title,
            posts.category_id,
            posts.description,
            posts.created_at
            FROM '.$this->table.' posts LEFT JOIN
            category ON posts.category_id = category.id
            ORDER BY
             posts.created_at DESC
        ';

        $post = $this->connection->prepare($query);
        
        $post->execute();
        
        return $post;
    }

}


