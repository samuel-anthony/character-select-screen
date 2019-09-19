<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Intervention\Image\Facades\Image;

class CharacterSelectController extends Controller
{
  public function index()
  {
      //$newJsonString = json_encode($allUser, JSON_PRETTY_PRINT);

      //file_put_contents(base_path('storage/dataAnak.json'), stripslashes($newJsonString));
      /*for($a = 0; $a < count($allUser) ; $a++){
        $image = Image::make(public_path("storage/big/{$allUser[$a]->profileImage}.jpg"))->fit(300,500);
        $image->save();
        $image = Image::make(public_path("storage/small/{$allUser[$a]->profileImage}.jpg"))->fit(300,300);
        $image->save();
      }*/
      if(profile::all()->count()==0){
        app('App\Http\Controllers\MainPageController')->resetDatabase();
      }
      $allUser = profile::all();
      return view('characterSelect',[
        'allUser' => $allUser,
      ]);
  }
  public function pressKey($param1,$param2){
    //param1 = pointer, param2 = incremental
    $validatedParam = $this->validation($param1,$param2);
    $user =profile::find($validatedParam);
    return ([
      'playerImage' => "/storage/big/".$user->profileImage.".jpg",
      'playerName' => $user->name,
      'newValue' => $validatedParam
    ]);
  }

  public function validation($param1,$param2){
    $counter = count(profile::all());
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
      'count'=>profile::all()->count(),
      'allUser'=>profile::where('isPicked','N')->get(),
      'pickedUser'=>profile::where('isPicked','Y')->get()
    ]);
  }

  public function submit($param1,$param2){
    $user =profile::find($param1);
    $user->isPicked = 'Y';
    $user->save();
    $user =profile::find($param2);
    $user->isPicked = 'Y';
    $user->save();
    $this->index();
  }
}
