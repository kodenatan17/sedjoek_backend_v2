<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\EventModel;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limut');
        $title = $request->input('title');
        $content = $request->input('content');
        $url = $request->input('url');
        $created_by = $request->input('created_by');
        $urlImages = $request->input('urlImages');
        $show_event = $request->input('show_event');

        if ($id) {
            $event = EventModel::all()->find($id);
            if ($event) {
                return ResponseFormatter::success($event, 'Data Events berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Event tidak ada', 404);
            }
        }
        $event = EventModel::query();

        if ($title) {
            $event->where('title', 'like', '%' . $title . '%');
        }
        if ($content) {
            $event->where('content', 'like', '%' . $content . '%');
        }
        if ($url) {
            $event->where('url', 'like', '%' . $url . '%');
        }
        if ($created_by) {
            $event->where('created_by', 'like', '%' . $created_by . '%');
        }
        if ($urlImages) {
            $event->where('urlImages', 'like', '%' . $urlImages . '%');
        }
        if ($show_event) {
            $event->all();
        }
        return ResponseFormatter::success(
            $event->paginate($limit),
            'Data Events berhasil diambil',
        );
    }
}
