<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    ///// function return admin index view///////
    public function admin(){
        return view('admin.index');
    }

    ///// function publish and unpublish status////
    public function updatestatus($name,$ids)
    {
        $ids = explode(',', $ids);
        foreach ($ids as $x) {

            if($name == 'categories'){
                $update = Category::findOrFail($x);
            }


            if ($update->status == 0) {
                $update->status = 1;
                $update->save();
            }
            else {
                $update->status = 0;
                $update->save();
            }
        }
    }
    
    public function switchTheme(){
        $user =Auth::user();
        if ($user ->theme == 'light') {
            $user ->theme = 'dark';
            $user ->save();
        }else {
            $user->theme = 'light';
            $user->save();
        }
        return back();
    }
}
