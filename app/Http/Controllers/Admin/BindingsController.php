<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BindingsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bindings\ActiveBindingRequest;
use App\Http\Requests\Bindings\SelectChildIdRequest;
use App\Models\Binding;
use App\Models\Children;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BindingsController extends AdminBaseController
{
    /**
     * @var string
     */

    protected $modelClass = Binding::class;

    /**
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }
    public function exportExcel()
    {
        return Excel::download(new BindingsExport(), 'bindings.xlsx');
    }
    public function index()
    {
        $items = $this->model->orderBy('must_be','desc')
            ->get();
        $children = Children::orderBy('child_id')->get();
        return response()
            ->view('admin.pages.bindings.index', compact('children','items'));
    }


    public function selectchild(SelectChildIdRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->children_id = $request->children_id;
        $item->timestamps = false;
        if ($item->save()) {

            $result['success'] = true;
        }

        return response()->json($result);
    }



    /**
     * Activate/Deactivate the specified resource from storage
     *
     * @param ActiveBindingRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveBindingRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        $item->must_be = Carbon::now()->addMonth();
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    public function search(Request $request)
    {
        $children = Children::all();

        $search = $request->get('search');
        $items = $this->model
                ->where('sponsor_id','like','%' .$search. '%')
                ->orwhereHas('sponsor', function($q) use ($search){
                    $q->where('name', 'LIKE', '%' . $search . '%');
                    $q->orWhere('email', 'LIKE', '%' . $search . '%');
                })
                ->get();
        return view('admin.pages.bindings.index',compact('items','children'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.bindings.index');
    }
}
