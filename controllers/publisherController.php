<?php
  // file: controllers/BooksController.php

  require_once('models/Publisher.php');

  class publisherController extends Controller {

    public function index() {  
      return view('publisher',
       ['publisher'=>Publisher::all()
        ]);
    }

    public function show($id) {
      $prof = Publisher::find($id);
      return view('publisher',
        ['publisher'=>$prof,
         'title'=>'author Detail']);
    }

    public function create() {
      return view('Agregar_Publisher',
        ['title'=>'author Create']);
    }  
  
    public function store() {
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               Publisher::create($item);
      return redirect('/list_Publisher');
    }  

    public function edit($id) {
      $prof = Publisher::find($id);
      return view('Editar_Publisher',
        ['publisher'=>$prof,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               Publisher::update($id,$item);
      return redirect('/list_Publisher');
    }  

    public function destroy($id) {  
      Publisher::destroy($id);
      return redirect('/publisher');
    }
  }
?>