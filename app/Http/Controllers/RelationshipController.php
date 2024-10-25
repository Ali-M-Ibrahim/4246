<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetails;
use App\Models\Reader;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function getBooksFromAuthor(){
        //select * from authors where id=1;
        $author = Author::find(1);
        $relatedBooks= $author->getBooks;
        return $relatedBooks;

    }

    public function getAuthorFromBook(){
        $book = Book::find(1);
        $relatedAuthor= $book->getAuthor;
        return $relatedAuthor;
    }

    public function getDetailsFromBook(){
        $book = Book::find(1);
        $details= $book->getDetails;
        return $details;
    }

    public function getBookFromDetails(){
        $details = BookDetails::find(1);
        $book= $details->getBook;
        return $book;
    }

    public function getBooksFromReader(){
        $reader= Reader::find(2);
        $books= $reader->getBooks;
        return $books;
    }

    public function getReaderFromBook(){
        $book= Book::find(2);
        $reader = $book->getReaders;
        return $reader;
    }
}
