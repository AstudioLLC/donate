<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Constants\UserType;
use App\Models\AbstractModel;
use App\Models\Category;
use App\Models\DiscountForUser;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use App\Models\UserDiscount;
use App\Services\Notify\Facades\Notify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UsersControllerAdmin extends AdminBaseController
{
    public function index()
    {
        $data['title'] = t('Admin header.Site users');

        return view('admin.pages.users.index', $data);

        //User::where(['type' => 0, 'watched' => 0])->update(['watched' => 1]);

        /*if (!empty($role)) {
            $data['title'] = User::ROLEFRONT[$role];

            $data['items'] = User::getByRoles($role);
            if (!count($data['items'])) {
                return redirect('/admin');
            }
            $data['role'] = $role;

            return view('admin.pages.users.main', $data);
        }
        $data['title'] = t('Admin header.Site users');

        $data['items'] = User::query()
            ->where('role', UserRole::USER)
            ->where('type', UserType::RETAIL)
            ->with('orders')
            ->sort()
            ->get();
        $data['type'] = 0;

        return view('admin.pages.users.main', $data);*/
    }

    /**
     * @param Request $request
     * @return array
     */
    public function listPortion(Request $request)
    {
        Session::put('sort', $request->get('start') ?? 0);
        $model = User::query()
            ->where('role', UserRole::USER)
            ->where('type', UserType::RETAIL)
            ->with('orders');

        $search = $request->input('search');

        $result = DataTables::eloquent($model)
            ->order(function (Builder $query) use ($request) {
                if ($request->has('order')) {
                    $order = Arr::first($request->input('order'));
                    $orderColumn = $request->input("columns.{$order['column']}.data");
                    $orderDir = $order['dir'];

                    /*if (in_array($orderColumn, (new User)->translatable)) {
                        $orderColumn = $orderColumn . '->' . app()->getLocale();
                    }*/

                    $query->orderBy($orderColumn, $orderDir);
                } else {
                    $query->orderBy('id', 'desc');
                }
            })->filter(function (Builder $query) use ($search) {
                if (!empty($search['value'])) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('email', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('created_at', 'LIKE', '%' . $search['value'] . '%');
                }
            });

        $result->editColumn('active', function (User $item) {
            return $item->active ? t('Admin pages list.active') : t('Admin pages list.inactive');
        });
        $result->editColumn('ordersCount', function (User $item) {
            return count($item->orders);
        });
        $result->editColumn('created_at', function (User $item) {
            return $item->created_at->format('d.m.Y');//->calendar();
        });

        return $result->toArray();
    }

    public function userDiscount($id)
    {
        $data['title'] = t('Admin users discount.edit');
        $data['discounts'] = DiscountForUser::all();
        $data['user_id'] = $id;
        $data['user_discount'] = UserDiscount::where('user_id', $id)->first();

        return view('admin.pages.users.user_discount', $data);
    }

    public function acceptEmail($id)
    {
        $user = User::where('id', $id)->first();
        $user->verification = null;
        $user->save();

        return redirect()->back();
    }

    public function addDiscountToUser(Request $request, $id)
    {
        $result = UserDiscount::action($id,$request->discount);
        $data['discounts'] = DiscountForUser::all();
        $data['user_id'] = $id;
        $data['user_discount'] = UserDiscount::where('user_id', $id)->first();

        return view('admin.pages.users.user_discount', $data);
    }

    public function magazine()
    {
        $data = ['title' => 'Оптовики'];
        $data['items'] = User::getUsersByTypeWithItems(1);
        $data['type'] = 1;
        User::where(['type' => 1, 'watched' => 0])->update(['watched' => 1]);

        return view('admin.pages.users.main', $data);
    }

    public function addUserByType(Request $request, $type)
    {
        if ($request->post()) {

            $inputs = $request->all();
            $user = User::where('email', $inputs['email'])->first();
            if (!empty($user)) {
                Notify::error(t('Admin action notify.email unique'));
                return redirect()->back();
            }
            $this->validator($inputs)->validate();
            $user = new User();
            $user->name = $inputs['name'];
            $user->active = $inputs['active'] ?? 0;
            $user->email = $inputs['email'];
            $user->password = Hash::make($inputs['password']);
            $user->type = $type;
            if ($user->save()) {
                //Notify::success(User::TYPE[$type] . ' добавлен успешно');
                Notify::success(t('Admin action notify.success added'));
                return redirect()->route('admin.users.view.magazine');
            }
        }
        $data['type'] = $type;
        $data['title'] = t('Admin pages titles.add');

        return view('admin.pages.users.form', $data);
    }

    private function validator($inputs, $edit = false)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required_with:confirm_password|string|max:20|same:confirm_password|min:8',
        ];

        return Validator::make($inputs, $rules, [
            'name.required' => ' Введите Имя.',
            'email.required' => ' Введите Эл.почту.',
            'password.required' => ' Введите Пароль.',
            'password.required_with' => ' Введите Пароль и Повтарите Пароль.',
            'confirm_password.required' => ' Повтарите Пароль.',
            'password.same' => 'Пароли не совпадают',
            'password.min' => 'Пароли должен быть не менее 8 символ',
            'password.max' => 'Пароли должен быть не более 20 символ',
            'password.string' => 'Пароли должен (A-Z)(0-9)',
            'email.email' => 'Введите правильную Эл.почту',
            'email.max' => 'Эл.почту должен быть не более 255 символ',
            'name.max' => 'Имя должен быть не более 255 символ',
        ]);
    }

    public function addAdminsByType(Request $request, $role)
    {
        if ($request->post()) {
            $inputs = $request->all();
            $user = User::where('email', $inputs['email'])->first();
            if (!empty($user)) {
                Notify::error(t('Admin action notify.email unique'));
                return redirect()->back();
            }
            $this->validator($inputs)->validate();
            $user = new User();
            $user->name = $inputs['name'];
            $user->active = $inputs['active'] ?? 0;
            $user->email = $inputs['email'];
            $user->password = Hash::make($inputs['password']);
            $user->role = $role;
            if ($user->save()) {
                //Notify::success(User::ROLE[$role] . ' добавлен успешно');
                Notify::success(t('Admin action notify.success added'));
                return redirect()->route('admin.users.main', ['role' => $role]);
            }
        }
        $data['role'] = $role;
        $data['title'] = t('Admin pages titles.add');

        return view('admin.pages.users.form', $data);
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $user = User::where('id', $id)->first();
            if ($user && User::deleteUser($user)) {
                $result['success'] = true;
            }
        }

        return response()->json($result);

    }

    public function view($id)
    {
        $data = [];
        $data['item'] = User::where('id', $id)->with('orders')->firstOrFail();

        $data['title'] = t('Admin users list.user') . ' "' . $data['item']->email . '"';
        $data['orders'] = $orders = $data['item']->orders;
        $data['orders_count'] = [
            'pending' => $orders->where('status', Order::STATUS_PENDING)->count(),
            'new' => $orders->where('status', Order::STATUS_NEW)->count(),
            'declined' => $orders->where('status', Order::STATUS_DECLINED)->count(),
            'accepted' => $orders->where('status', Order::STATUS_DONE)->count(),
        ];

        return view('admin.pages.users.view', $data);
    }

    public function toggleActive(Request $request)
    {
        $id = $request->input('id');
        $active = $request->input('active');
        if (!is_id($id)) abort(404);
        $item = User::findOrFail($id);
        $item->active = $active ? 1 : 0;
        $item->save();
        Notify::success(t('Admin action notify.success saved'));

        return redirect()->route('admin.users.view', ['id' => $item->id]);
    }
}
