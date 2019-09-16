<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;

class mainPageController extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function resetDatabase(){
      $jsonString = file_get_contents(base_path('storage/dataAnak.json'));
      $allUser = json_decode($jsonString, true);

      //$newJsonString = json_encode($allUser, JSON_PRETTY_PRINT);

      //file_put_contents(base_path('storage/dataAnak.json'), stripslashes($newJsonString));
      if(count(profile::all())>0){
        profile::truncate();
      }
      for($a = 0; $a < count($allUser) ; $a++){
        $player = new profile();
        $player->name = $allUser[$a]['name'];
        $player->profileImage = $allUser[$a]['profileImage'];
        $player->isPicked = 'N';
        $player->save();
      }
    }
}
