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
        $blogs=DB::Select('SELECT 
                                p.id as postid,
                                p.user_id,
                                p.active,
                                p.title,
                                p.body,
                                p.published_at,
                                p.created_at,
                                p.updated_at,
                                p.deleted_at,
                                u.id,
                                u.name,
                                u.email,
                                u.created_at
                            FROM
                                post p
                                    INNER JOIN
                                user u ON p.user_id = u.id');

        return response()->json($blogs);
        //return view('administrator', ['title' => 'Administrator', 'name' => 'This is the administrators site','blogs'=>$blogs]);
    }

}