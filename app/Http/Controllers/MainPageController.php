<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\game;

class mainPageController extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function resetDatabase(){
      if(count(profile::all())>0){
        profile::truncate();
      }
      $jsonString = file_get_contents(base_path('storage/dataAnak.json'));
      $allUser = json_decode($jsonString, true);
      //resave picture
      for($a = 0; $a < count($allUser) ; $a++){
        /*$image = Image::make(public_path("storage/big/{$allUser[$a]->profileImage}.jpg"))->fit(300,500);
        $image->save();
        $image = Image::make(public_path("storage/small/{$allUser[$a]->profileImage}.jpg"))->fit(300,300);
        $image->save();*/
        //save to db
        $player = new profile();
        $player->name = $allUser[$a]['name'];
        $player->profileImage = $allUser[$a]['profileImage'];
        $player->isPicked = 'N';
        $player->save();
      }

      if(count(game::all())>0){
        game::truncate();
      }
      $this->insertGame();

    }

    public function insertGame(){
      $jsonString = file_get_contents(base_path('storage/listGame.json'));
      $allGame = json_decode($jsonString, true);
      for($a = 0; $a < count($allGame) ; $a++){
        $game = new game();
        $game->name = $allGame[$a]['name'];
        $game->isPicked = $allGame[$a]['isPicked'];
        $game->save();
      }
    }
}
