<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
	public function index()
{
   $data['intro']='<div class="jumbotron mt-5">
   <h1>Hai, '.session()->get('nama').'</h1>
   <p>Silahkan gunakan halaman ini untuk menampilkan informasi Hotel !</p>
   </div>';
   return view ('dahsboard', $data);
}    
}