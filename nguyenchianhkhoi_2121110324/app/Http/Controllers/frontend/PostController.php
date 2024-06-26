<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    public function index()
    {
    $list_post = Post::where('status', '=', 1)
    ->orderBy('created_at','desc')
    ->paginate(9);
    return view("frontend.post", compact('list_post'));
    }

    public function detail($slug)
    {
        $post=Post::where([['status','=',1], ['slug', '=', $slug]])->first();
        $list_post = Post::where([['status', '=', 1], ['id', '!=', $post->id]])
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
        return view('frontend.post_detail', compact('post', 'list_post'));
    }

    public function getlisttopicid($rowid)
    {
        $listtopid=[];
            array_push($listtopid, $rowid);
            $list1 = Topic::where([['parent_id','=',$rowid], ['status','=',1]])->select("id")->get();
            if(count($list1)>0)
            {
                foreach($list1 as $row1)
                {
                    array_push($listtopid, $row1->id);
                    $list2 = Topic::where([['parent_id','=', $row1->id],['status','=',1]])->select("id")->get();
                    if(count($list2)>0)
                    {
                        foreach($list2 as $row2)
                        {
                            array_push($listtopid, $row2->id);
                            // $list2 = Category::where([['parent_id','=',$row1->id],['status','=',1]])->select("id")->get();
                        }
                    }
                }
            }
            return $listtopid;

    }

          // topic
          public function topic($slug)
        {
            $row=Topic::where('slug','=',$slug)->select("id", "name", "slug")->first();
            $listtopid=[];
            if($row!=null)
            {
                $listtopid = $this->getlistcategoryid($row->id);
            }
            $list_post = Post::where('status', '=', 1)
            ->whereIn('topic_id', $listtopid)
            ->orderBy('created_at','desc')
            ->paginate(9);
            return view("frontend.post_topic", compact('list_post', 'row'));
        }
}
