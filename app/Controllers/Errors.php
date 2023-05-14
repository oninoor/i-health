<?php

namespace App\Controllers;

class Errors extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Error_403'])
    ];
    return view('pages-403', $data);
  }
}
