<?php
  // file: controllers/BooksController.php

  require_once('models/Book.php');

  class BooksController extends Controller {

    public function index() {  
      return view('book',
       ['books'=>Book::all()
        ]);
    }

    public function show($id) {
      $prof = Book::find($id);
      return view('books',
        ['books'=>$prof,
         'title'=>'books Detail']);
    }

    public function create() {
      return view('Agregar_Book',
        ['title'=>'Books Create']);
    }  
  
    public function store() {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
               Book::create($item);
      return redirect('/');
    }  

    public function edit($id) {
      $prof = Book::find($id);
      return view('Editar_Book',
        ['books'=>$prof,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
               Book::update($id,$item);
      return redirect('/');
    }  

    public function destroy($id) {  
      Book::destroy($id);
      return redirect('/books');
    }
  }
?>