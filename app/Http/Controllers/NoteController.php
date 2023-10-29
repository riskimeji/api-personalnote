<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::latest()->get();

        $response = [];

        foreach ($notes as $note) {
            $updatedAt = $note->updated_at;
            $timeAgo = $updatedAt->diffForHumans();

            $response[] = [
                "id" => $note->id,
                "title" => $note->title,
                "content" => $note->content,
                "updated_at" => $timeAgo
            ];
        }

        return response()->json($response);
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
    // Validasi data masukan (sesuaikan dengan aturan validasi Anda)
    $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    // Buat catatan baru
    $note = new Note;
    $note->title = $request->input('title');
    $note->content = $request->input('content');
    $note->save();

    return response()->json(['message' => 'Catatan berhasil dibuat', 'data' => $note]);
}

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
         $note = Note::find($request->id);

    if (!$note) {
        return response()->json(['message' => 'Catatan tidak ditemukan'], 404);
    }

    $note->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    return response()->json(['message' => 'Catatan berhasil diperbarui', 'data' => $note]);
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id){
    $note = Note::find($id);

    if (!$note) {
        return response()->json(['message' => 'Catatan tidak ditemukan'], 404);
    }

    $note->delete();

    return response()->json(['message' => 'Catatan berhasil dihapus']);
}

}
