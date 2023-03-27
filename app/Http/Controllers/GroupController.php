<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use League\CommonMark\Extension\Mention\Mention;

class GroupController extends Controller
{
    public function index()
    {
        return view('pages.groups.index', ['groups' => Group::latest()->filter(request(['search']))->paginate(8)]);
    }

    public function show($id)
    {
        $groups = Group::all();
        return view('pages.groups.group_details', ['group' => $groups->find($id)]);
    }

    public function join(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'group_id' => $request->group_id
        ];

        $join = Member::where($data);

        if ($join->exists()) {
            $join->delete();
            return redirect(route('groups'));
        } else {
            Member::create($data);
            return Redirect::back()->with('message','Joinded with success');
        }
    }

    public function create()
    {
        return view('pages.groups.create', ['books' => Book::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required',
            'user_id' => 'required',
            'book_id' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('images' , 'public');
        }

        Group::create($data);

        $target_group = Group::all()->last();

        $member_data = [
            'user_id'  => $target_group->user->id,
            'group_id' => $target_group->id
        ];

        Member::create($member_data);
        return redirect(route('groups'));
    }

    public function comment(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'group_id' => 'required',
            'user_id' => 'required'
        ]);

        Comment::create($data);
        return Redirect::back();
    }

    public function destroy(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'id' => $request->group_id
        ];

        $group = Group::where($data);
        $group->delete();
        return redirect(route('groups'))->with('message', 'You removed your group successfully!');
    }
}
