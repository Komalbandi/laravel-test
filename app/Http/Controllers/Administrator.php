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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class Administrator extends Controller
{
    /**
     * Show all blog posts.
     *
     * @return Response
     */
    public function show()
    {
        $blogs = DB::Select('SELECT 
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

    /**
     * Create new blog for administrator
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newBlog(Request $request)
    {

        try {
            DB::insert('INSERT INTO `post`
                    (`user_id`,
                    `active`,
                    `title`,
                    `body`,
                    `published_at`,
                    `created_at`
                    )
                    VALUES
                    (?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?)', ['1', $request->active, $request->title, $request->body, date('Y-m-d'), date('Y-m-d')]);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['result' => 'Error', 'message' => 'Unable to connect to the database, please try again later']);
        }

        return response()->json(['result' => 'OK', 'message' => 'Entry inserted']);
    }


    /**
     * Get individual blog
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function getBlog(Request $request)
    {
        $id = $request->id;
        try {
            $post_data = DB::select('select * from post where id=?', [$id]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['result' => 'Error', 'message' => 'Unable to connect to the database, please try again later']);
        }

        return response()->json($post_data[0]);

    }

    public function updateBlog(Request $request)
    {
        $id = $request->id;
        $active = $request->active;
        $body = $request->body;
        $title = $request->title;

        try {
            DB::update('UPDATE `post`
                        SET
                        `active` = ?,
                        `title` = ?,
                        `body` = ?,
                        `updated_at` = ?
                        WHERE `id` = ?', [$active, $title, $body, date('Y-m-d'), $id]);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return reponse()->json(['result' => 'Error', 'message' => 'Unable to connect to the database, please try again later']);
        }

        return response()->json(['result'=>'OK','message'=>'Blog has been updated']);
    }

}