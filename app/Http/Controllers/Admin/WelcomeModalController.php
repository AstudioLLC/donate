<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WelcomeModal\ActiveWelcomeModalRequest;
use App\Http\Requests\WelcomeModal\DeleteWelcomeModalRequest;
use App\Http\Requests\WelcomeModal\StoreWelcomeModalRequest;
use App\Http\Requests\WelcomeModal\UpdateWelcomeModalRequest;
use App\Models\WelcomeModal;
use Illuminate\Http\Request;

class WelcomeModalController extends AdminBaseController
{
    /**
     * @var string
     */

    protected $modelClass = WelcomeModal::class;

    /**
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }

    public function index()
    {
        $items = $this->model
            ->get();

        return response()
            ->view('admin.pages.welcome_modals.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.welcome_modals.index');
        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.welcome_modals.create', compact('edit', 'backUrl', 'imageSize'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWelcomeModalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWelcomeModalRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));

        return redirect()
            ->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = $this->model::findOrFail($id);
        $edit = true;
        $backUrl = route('admin.welcome_modals.index');

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.welcome_modals.edit', compact('item', 'edit', 'backUrl', 'imageSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWelcomeModalRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateWelcomeModalRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));

        return redirect()
            ->route('admin.welcome_modals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteWelcomeModalRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteWelcomeModalRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        if ($item->delete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * Activate/Deactivate the specified resource from storage
     *
     * @param ActiveWelcomeModalRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveWelcomeModalRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
