<?php
  // file: controllers/BooksController.php

  require_once('models/Author.php');

  class AuthorController extends Controller {

    public function index() {  
      return view('author',
       ['author'=>Author::all()
        ]);
    }

    public function show($id) {
      $prof = Author::find($id);
      return view('author',
        ['author'=>$prof,
         'title'=>'author Detail']);
    }

    public function create() {
      return view('Agregar_author',
        ['title'=>'author Create']);
    }  
  
    public function store() {
      $name = Input::get('name');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');
      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
               Author::create($item);
      return redirect('/list_Author');
    }  

    public function edit($id) {
      $prof = Author::find($id);
      return view('Editar_Author',
        ['author'=>$prof,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      $name = Input::get('name');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');
      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
               Author::update($id,$item);
      return redirect('/list_Author');
    }  

    public function destroy($id) {  
      Book::destroy($id);
      return redirect('list_Author');
    }
  }
?>