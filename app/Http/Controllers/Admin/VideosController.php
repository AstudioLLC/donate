<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Video\DeleteVideoRequest;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Http\Requests\Video\UpdateVideoRequest;
use App\Mail\newVideo;
use App\Models\Children;
use App\Models\Video;
use App\Traits\InteractsWithSortable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class VideosController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Video::class;

    /**
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $video
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function index(string $video, int $key)
    {
        $backUrl = url()->previous();

        $items = $this->modelClass::where(['video' => $video, 'key' => $key])
            ->sort()
            ->get();
        $child = Children::where('id',$key)->first();

        return response()
            ->view('admin.pages.videos.index', compact('child','video', 'key', 'backUrl', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $video
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function create(string $video, int $key)
    {
        $edit = false;
        $backUrl = route('admin.videos.index', ['video' => $video, 'key' => $key]);
        return response()
            ->view('admin.pages.videos.create', compact('video', 'key', 'edit', 'backUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $video
     * @param int $key
     * @param StoreVideoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(string $video, int $key, StoreVideoRequest $request)
    {
        if(strlen($request['link']) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request['link'], $match))
            {
                $request['link'] = $match[1];
            }
        }

        $this->model->create($request->except('_token', '_method'));

//        $sponsor_id = Children::where('id',$key)->pluck('sponsor_id')->first();
//        $user = User::where('id',$sponsor_id)->firstOrFail();

//        Mail::to($user->email)->send(new newVideo($user));


        return redirect()
            ->route('admin.videos.index', ['video' => $video, 'key' => $key]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $video
     * @param int $key
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $video, int $key, int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        $edit = true;
        $backUrl = route('admin.videos.index', ['video' => $video, 'key' => $key]);
        $child = Children::where('id',$key)->first();

        return response()
            ->view('admin.pages.videos.edit', compact('child','video', 'key', 'edit', 'backUrl', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $video
     * @param int $key
     * @param int $id
     * @param UpdateVideoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $video, int $key, int $id, UpdateVideoRequest $request)
    {
        $item = $this->modelClass::findOrFail($id);
        if(strlen($request['link']) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request['link'], $match))
            {
                $request['link'] = $match[1];
            }
        }
        $item->update($request->except('_token', '_method'));

        $sponsor_id = Children::where('id',$key)->pluck('sponsor_id')->first();
        $user = User::where('id',$sponsor_id)->firstOrFail();

//        Mail::to($user->email)->send(new newVideo($user));

        return redirect()
            ->route('admin.videos.index', ['video' => $video, 'key' => $key]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param DeleteVideoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteVideoRequest $request)
    {
        $item = $this->modelClass::findOrFail($id);
        $result = ['success' => false];
        $item->delete();
        $result['success'] = true;

        return response()->json($result);
    }
}
