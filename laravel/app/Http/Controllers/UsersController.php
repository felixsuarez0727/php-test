<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_user(Request $req)
    {
        $user = new Users;
        $user->name = $req->name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->password = $req->password;
        $isSaved = $user->save();
        if ($isSaved) {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Operation Failed"];
    }

    public function add_usr (Request $req)
    {
        $user = new Users;
        $user->name = $req->name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->password = $req->password;
        $isSaved = $user->save();
        if ($isSaved) {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Operation Failed"];
    }

    public function get_user($id = null)
    {
        if($id == null){
            return ["Result" => "User ID not specified"];
        }
        $isFetch = Users::find($id);

        if (!$isFetch) {
            return ["Result" => "User with this id does no exists!"];
        }

        return $isFetch;
    }

}
