<?php
/**
 * Created by PhpStorm.
 * User: bandi
 * Date: 02/06/2017
 * Time: 12:08 PM
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;

class Administrator extends Controller
{
    /**
     * Show all blog posts.
     *
     * @return Response
     */
    public function show()
    {
        $blogs = DB::table('post')->join('user', 'user.id', '=', 'post.user_id')->get();
        var_dump($blogs);
        return view('administrator', ['title' => 'Administrator', 'name' => 'This is the administrators site','blogs'=>$blogs]);
    }

}