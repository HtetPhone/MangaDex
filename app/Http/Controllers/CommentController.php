<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        // dd($request);
        $request->user()->comments()->create($request->only('comment', 'chapter_id'));
        return back()->with(['message' => 'Successfully posted a comment']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return abort('403');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        // dd($request);
        $this->authorize('update', $comment);
        $comment->update(['comment' => $request->comment_edit]);
        return back()->with(['message' => 'Comment has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with(['message' => 'Comment has been deleted!!']);
    }
}
