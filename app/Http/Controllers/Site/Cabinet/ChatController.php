<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BaseController;
use App\Http\Requests\Frontend\Chat\StoreChatRequest;
use App\Models\Chat;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends BaseController
{
    /**
     * View namespace for Cabinet
     * @var string
     */
    protected $viewsNamespace = 'site.pages.cabinet.';

    /**
     * @param int $childrenId
     * @param int $sponsorId
     * @return \Illuminate\Http\Response
     */
    public function index(int $childrenId, int $sponsorId)
    {
        $children = Children::where(['id' => $childrenId, 'active'=> 1])->firstOrFail();
        $items = Chat::where(['sponsor_id' => $sponsorId, 'children_id' => $childrenId])->orderBy('created_at', 'asc')->get();
        $backUrl = route('cabinet.home.index');
        DB::table('chat')->where('message_from',0)->where('is_read', 0)->update(['is_read' => 1]);

        $this->staticSEO(__('frontend.cabinet.Letters'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.Home'),
                'url' => $backUrl
            ],
            [
                'title' => __('frontend.cabinet.Letters'),
                'url' => ''
            ],
        ];

        $user = auth()->user();
        $active = 'home';

        return response()
            ->view($this->viewsNamespace.'chat.index', compact('user', 'breadcrumbs', 'active', 'backUrl', 'items', 'children'));
    }

    /**
     * @param StoreChatRequest $request
     * @param int $childrenId
     * @param int $sponsorId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChatRequest $request, int $childrenId, int $sponsorId)
    {
        Chat::create($request->except('_token', '_method'));

        return redirect()
            ->route('cabinet.chat.index', ['childrenId' => $childrenId, 'sponsorId' => $sponsorId]);
    }


}
