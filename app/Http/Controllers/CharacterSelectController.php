<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Intervention\Image\Facades\Image;

class CharacterSelectController extends Controller
{
  public function index()
  {
      //$allUser = profile::all();
      $jsonString = file_get_contents(base_path('storage/dataAnak.json'));
      $allUser = json_decode($jsonString, true);

      //$newJsonString = json_encode($allUser, JSON_PRETTY_PRINT);

      //file_put_contents(base_path('storage/dataAnak.json'), stripslashes($newJsonString));
      /*for($a = 0; $a < count($allUser) ; $a++){
        $image = Image::make(public_path("storage/big/{$allUser[$a]->profileImage}.jpg"))->fit(300,500);
        $image->save();
        $image = Image::make(public_path("storage/small/{$allUser[$a]->profileImage}.jpg"))->fit(300,300);
        $image->save();
      }*/
      return view('characterSelect',[
        'allUser' => $allUser,
      ]);
  }
  public function pressKey($param1,$param2){
    //param1 = pointer, param2 = incremental
    $jsonString = file_get_contents(base_path('storage/dataAnak.json'));
    $allUser = json_decode($jsonString, true);
    $validatedParam = $this->validation($param1,$param2,$allUser);
    $user =$allUser[$validatedParam];
    return ([
      'playerImage' => "/storage/big/".$user['profileImage'].".jpg",
      'playerName' => $user['name'],
      'newValue' => $validatedParam
    ]);
  }

  public function validation($param1,$param2,$allUser){
    $counter = count($allUser);
    if($param2 == 1){
      return $param1%10 == 9 ? (floor($param1/10)*10):($param1+$param2);
    }
    elseif ($param2 == -1) {
      return $param1%10 == 0 ? ((($param1/10)+1)*10-1):($param1+$param2);
    }
    elseif ($param2 == 10) {
      return ($param1+$param2)>$counter?  ($param1%10==0 ? 10 : (($param1+$param2)%10)): ($param1+$param2);
    }
    elseif ($param2 == -10) {
      return ($param1+$param2)<0 ?  ($counter+$param1+$param2): ($param1+$param2);
    }
  }

  public function getAllUser(){
    return([
      'count'=>count(profile::all()),
      'allUser'=>profile::all()
    ]);
  }
}
