<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use DB;
use Illuminate\Http\Request;

class FBlogController extends Controller
{
    //
    public function index()
    {
        $blogs = DB::table('blogs')->orderby('created_at', 'desc')->paginate(5);
        $populairePost = DB::table('blogs')->paginate(3);
        return view('frontend.blog.index')
            ->with('blogs', $blogs)
            ->with('populairePost', $populairePost);
    }

    public function search(Request $request)
    {
        $blogs = DB::table('blogs')
            ->where('article', 'like', "%" . $request->searchBlog . "%")
            ->orWhere('title', 'like', "%" . $request->searchBlog . "%")
            ->orderby('created_at', 'desc')
            ->paginate(5);
        $populairePost = DB::table('blogs')->paginate(3);
        return view('frontend.blog.index')
            ->with('blogs', $blogs)
            ->with('searchBlog', $request->searchBlog)
            ->with('populairePost', $populairePost);
    }

    public function show($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $populairePost = DB::table('blogs')->paginate(3);

        $comments = DB::table('blog_comments')->where('id_parent')->where('id_blogs', $id)->get();
        /*foreach($comments as $comment){
        $comment->subComments = DB::table('blog_comments')->where('id_parent',$comment->id)->whereNull('id_parent2')->get();
        foreach($comment->subComments as $subComment){
        $subComment->subSubComments = DB::table('blog_comments')->where('id_parent',$comment->id)->where('id_parent2',$subComment->id)->get();
        }
        }*/
        // get previous blog id
        $previous = DB::table('blogs')->where('id', '<', $id)->max('id');
        $previousTitle = $previous ? DB::table('blogs')->where('id', $previous)->first()->title : '';
        // get next blog id
        $next = DB::table('blogs')->where('id', '>', $id)->min('id');
        $nextTitle = $next ? DB::table('blogs')->where('id', $next)->first()->title : '';
        return view('frontend.blog.detail')
            ->with('comments', $comments)
            ->with('previous', $previous)
            ->with('next', $next)
            ->with('nextTitle', $nextTitle)
            ->with('previousTitle', $previousTitle)
            ->with('populairePost', $populairePost)
            ->with('blog', $blog);
    }
    public static function getBlogReviewsCount($id)
    {
        return DB::table('blog_comments')->where('id_blogs', $id)->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->except(['_token', '_method']);
        $input['created_by'] = 1;
        $input['updated_by'] = 1;
        $data = BlogComment::create($input);
        return redirect(route('frontend.blog.fdetail', $request->id_blogs))->with('success', 'Item added succesfully');
    }

    public static function getChildComments($id)
    {
        return DB::table('blog_comments')->where('id_parent', $id)->get();
    }

}
