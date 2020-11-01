<?php

namespace App\Http\Controllers\frontend;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FBlogController extends Controller
{
    //
    public function index()
    {
        $blogs = DB::table('blogs')->orderby('created_at','desc')->paginate(5);
        $categories = DB::table('camper_categories')->paginate(10);
        $populairePost = DB::table('blogs')->paginate(3);
        return view('frontend.blog.index')
            ->with('blogs', $blogs)
            ->with('categories', $categories)
            ->with('populairePost',$populairePost);
    }
    
    public function search(Request $request)
    {
        $blogs = DB::table('blogs')
                    ->where('article','like',"%".$request->searchBlog."%")
                    ->orWhere('title','like',"%".$request->searchBlog."%")
                    ->orderby('created_at','desc')
                    ->paginate(5);
        $categories = DB::table('camper_categories')->paginate(10);
        $populairePost = DB::table('blogs')->paginate(3);
        return view('frontend.blog.index')
            ->with('blogs', $blogs)
            ->with('searchBlog',$request->searchBlog)
            ->with('categories', $categories)
            ->with('populairePost',$populairePost);
    }

    public function show($id)
    {
        $blog = DB::table('blogs')->where('id',$id)->first();
        $populairePost = DB::table('blogs')->paginate(3);
        $categories = DB::table('camper_categories')->paginate(10);

        $comments = DB::table('blog_comments')->where('id_parent1')->where('id_blogs',$id)->get();
        // get previous blog id
        $previous = DB::table('blogs')->where('id', '<', $id)->max('id');
        $previousTitle = $previous ? DB::table('blogs')->where('id', $previous)->first()->title : '';
        // get next blog id
        $next = DB::table('blogs')->where('id', '>', $id)->min('id');
        $nextTitle = $next ? DB::table('blogs')->where('id', $next)->first()->title : '';
        return view('frontend.blog.detail')
                ->with('comments',$comments)
                ->with('previous', $previous)
                ->with('next', $next)
                ->with('nextTitle', $nextTitle)
                ->with('previousTitle', $previousTitle)
                ->with('populairePost',$populairePost)
                ->with('blog', $blog)
                ->with('categories', $categories);
    }

    public static function getBlogRating($id){
        return $id;
    }

    public static function getBlogReviews($id){
        return $id;
    }
    public static function getBlogReviewsCount($id){
        return DB::table('blog_comments')->where('id_blogs',$id)->count();
    }

    public static function getPreviousBlog($id){
        return $id;        
    }

    public static function getNextBlog($id){
        return $id;        
    }
}