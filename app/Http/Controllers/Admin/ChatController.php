<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\DeleteChatRequest;
use App\Http\Requests\Chat\ForceDestroyChatRequest;
use App\Http\Requests\Chat\RestoreChatRequest;
use App\Http\Requests\Chat\StoreChatRequest;
use App\Mail\newSponsorMessage;
use App\Models\Chat;
use App\Models\Children;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ChatController extends AdminBaseController
{
    /**
     * @var string
     */
    protected $modelClass = Chat::class;

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
     * @param int|null $childrenId
     * @param int|null $sponsorId
     * @return \Illuminate\Http\Response
     */
    public function index(int $childrenId = null, int $sponsorId = null)
    {
        $backUrl = route('admin.children.index');

        if ($childrenId) {
            $items = $this->model::where('children_id', $childrenId)->select('id', 'sponsor_id', 'children_id');
        } else {
            $items = $this->model::where('sponsor_id', $sponsorId)->select('id', 'sponsor_id', 'children_id');
        }

        $items = $items->orderBy('id', 'desc')->get()->groupBy('sponsor_id');

        return response()
            ->view('admin.pages.chat.index', compact('items', 'childrenId', 'sponsorId','backUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $childrenId = null, int $sponsorId = null)
    {
        dd($childrenId, $sponsorId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChatRequest $request
     * @param int $childrenId
     * @param int $sponsorId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChatRequest $request, int $childrenId, int $sponsorId)
    {
        $sp_mail = DB::table('users')->where('id',$sponsorId)->pluck('email')->first();
//        Mail::to($sp_mail)->send(new newSponsorMessage());

        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.chat.edit', ['childrenId' => $childrenId, 'sponsorId' => $sponsorId]);
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
     * @param int $childrenId
     * @param int $sponsorId
     */
    public function edit(int $childrenId, int $sponsorId)
    {
        $items = $this->model::where(['children_id' => $childrenId, 'sponsor_id' => $sponsorId])->withTrashed()
            ->orderBy('created_at', 'asc')
            ->get();
        DB::table('chat')->where('message_from',1)->where('admin_is_read', 0)
            ->where('children_id',$childrenId)->where('sponsor_id',$sponsorId)->update(['admin_is_read' => 1]);
        abort_if(!count($items), 404);
        $backUrl = route('admin.chat.index', ['childrenId' => $childrenId, 'sponsorId' => $sponsorId]);

        return response()
            ->view('admin.pages.chat.edit', compact('items', 'backUrl', 'childrenId', 'sponsorId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteChatRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteChatRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * @param RestoreChatRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreChatRequest $request, int $id)
    {
        $item = $this->model::onlyTrashed()->findOrFail($id);
        $result = ['success' => false];
        $item->restore();
        $result['success'] = true;

        return response()->json($result);
    }

    /**
     * @param ForceDestroyChatRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyChatRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
