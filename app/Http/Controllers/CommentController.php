<?php

namespace App\Http\Controllers;

use App\Events\CommentAdded;
use App\Models\Attachment;
use App\Models\Comment;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $comment_body = json_decode($request->comment_body);
        $comment = new Comment([
            'body' => $comment_body->comment_body,
            'user_id' => auth()->id(),
            'parent_id' => $comment_body->parent_id,
            'tracker_id' =>  $comment_body->tracker_id,
        ]);

        $comment->save();
        broadcast(new CommentAdded($comment))->toOthers();
        if ($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $fullName = $file->getClientOriginalName();
            $originalName   = pathinfo($fullName, PATHINFO_FILENAME);
            $fileExtension  = $file->getClientOriginalExtension();
            $attachmentName = $originalName. '.' . $fileExtension;
            $path = $file->storeAs('public/comments', $attachmentName);

            $store = Attachment::create([
                'table_id' => $comment->id,
                'table_name' => 'comments',
                'assign_name' => 'comment attachment',
                'original_name' => $originalName,
                'file' => $attachmentName,
                'created_by' => auth()->id(),
            ]);

        }

        return response()->json(['message' => 'comment added', 'status' => 200, 'comment' => $comment->load(['user','attachment'])]);
    }


    public function reply(Request $request)
    {
        try {

        } catch (\Exception $e) {

        }
        $data = $request->validate([
            'comment_body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
            'tracker_id' => 'required|exists:trackers,id', // Assuming the existence of the trackers table
        ]);

        $comment = new Comment([
            'body' => $data['comment_body'],
            'user_id' => auth()->id(),
            'parent_id' => $data['parent_id'],
            'tracker_id' => $data['tracker_id'],
        ]);

        $comment->save();

        return response()->json(['message' => 'comment added', 'status' => 200, 'comment' => $comment->load(['user'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        return $id;
        $data = $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
//        $this->authorize('update', $comment); // Implement authorization as needed

        $comment->update(['body' => $data['comment_body']]);
        return response()->json(['message' => 'comment added', 'status' => 200, 'comment' => $comment->load(['user'])]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
//        $this->authorize('delete', $comment); // Implement authorization as needed

        $comment->delete();
        return response()->json(['message' => 'comment deleted', 'status' => 200]);
    }
}
