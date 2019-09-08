<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Intervention\Image\Facades\Image;

class CharacterSelectController extends Controller
{
  public function index()
  {
      $allUser = profile::all();
      for($a = 0; $a < count($allUser) ; $a++){
        $image = Image::make(public_path("storage/big/{$allUser[$a]->profileImage}.jpg"))->fit(300,500);
        $image->save();
        $image = Image::make(public_path("storage/small/{$allUser[$a]->profileImage}.jpg"))->fit(300,300);
        $image->save();
      }
      return view('characterSelect',[
        'allUser' => $allUser,
      ]);
  }
  public function pressKey($param1,$param2){
    //param1 = pointer, param2 = incremental
    $validatedParam = $this->validation($param1,$param2);
    $user = profile::find($validatedParam);
    return ([
      'playerImage' => "/storage/big/".$user->profileImage.".jpg",
      'playerName' => $user->name,
      'newValue' => $validatedParam
    ]);
  }

  public function validation($param1,$param2){
    $allUser = profile::all();
    $counter = count($allUser);
    if($param2 == 1){
      return $param1%10 == 0 ? ($param2):($param1+$param2);
    }
    elseif ($param2 == -1) {
      return $param1%10 == 1 ? (ceil($param1/10)*10):($param1+$param2);
    }
    elseif ($param2 == 10) {
      return ($param1+$param2)>$counter?  ($param1%10==0 ? 10 : (($param1+$param2)%10)): ($param1+$param2);
    }
    elseif ($param2 == -10) {
      return ($param1+$param2)<=0 ?  ($counter+$param1+$param2): ($param1+$param2);
    }
  }
}
