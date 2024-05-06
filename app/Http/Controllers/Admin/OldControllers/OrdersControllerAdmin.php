<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Snowfire\Beautymail\Beautymail;

class OrdersControllerAdmin extends AdminBaseController
{
    public function newOrders()
    {
        $data = [
            'title' => 'Новые заказы',
        ];
        $data['status'] = Order::STATUS_NEW;
        $data['items'] = Order::getOrdersWithStatus(Order::STATUS_NEW);

        return view('admin.pages.orders.main', $data);
    }

    public function doneOrders()
    {
        $data = [
            'title' => 'Выполненные заказы',
        ];
        $data['items'] = Order::getOrdersWithStatus(Order::STATUS_DONE);
        $data['status'] = Order::STATUS_DONE;

        return view('admin.pages.orders.main', $data);
    }

    public function changeProcess(Request $request, $id)
    {
        $order = Order::getItem($id);
        if ($order->status != Order::STATUS_PENDING) return redirect()->back();
        $process = (int)$request->input('process');
        $paid = (int)$request->has('paid');
        if ($process < 0 || $process > 3) return redirect()->back();
        $order->process = $process;
        $order->paid = $paid;
        if ($process == 3 && $paid) {
            $order->status = Order::STATUS_DONE;
        }
        $order->save();
        Notify::get('changes_saved');

        return redirect()->back();
    }

    public function pendingOrders()
    {
        $data = [
            'title' => 'Невыполненные заказы',
        ];
        $data['items'] = Order::getOrdersWithStatus(Order::STATUS_PENDING);
        $data['status'] = Order::STATUS_PENDING;

        return view('admin.pages.orders.main', $data);
    }

    public function declinedOrders()
    {
        $data = [
            'title' => 'Откланенные заказы',
        ];
        $data['status'] = Order::STATUS_DECLINED;
        $data['items'] = Order::getOrdersWithStatus(Order::STATUS_DECLINED);

        return view('admin.pages.orders.main', $data);
    }

    public function view($id)
    {
        $data = [];
        $data['item'] = Order::where('id', $id)->with(['items' => function ($q) {
            $q->with('company');
        }])->first();
        if (!empty($data['item'])) {
            $data['title'] = 'Заказ N' . $data['item']->id;
        }

        $data['process'] = Order::PROCESS;

        return view('admin.pages.orders.view', $data);
    }

    public function respond(Request $request, $id)
    {
        $order = Order::with('items', 'user')->where('id', $id)->firstOrFail();

        if (!$request->input('status')) {
            $message = 'Заказ Отклонен';
            $order->status = Order::STATUS_DECLINED;
            $order->save();
            Notify::success($message);

            return redirect()->back();
        }

        $order->status = Order::STATUS_PENDING;
        $message = 'Заказ принят';
        foreach ($order->items as $order_part) {
            $new_count = $order_part->count - $order_part->pivot->count;
            if ($new_count < 0) $new_count = 0;
            $order_part->count = $new_count;
            $order_part->save();
        }

        if (!empty($order->user) && !empty($order->user->email)) {
            $user = $order->user;

            try {
                app()->make(Beautymail::class)->send('site.notifications.order_sent', [
                    'url' => route('cabinet.profile.orders.active'),
                    'order' => $order
                ], function ($message) use ($user) {
                    $message->from(env('MAIL_FROM_ADDRESS'))
                        ->to($user->email, $user->name)
                        ->subject('Ваш заказ на сайте Arlanbazar.kz одобрен');
                });
            } catch (\Exception $exception) {

            }
        }
        $order->save();
        Notify::success($message);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Order::find($id);
            if ($item && $item->status != '0' && $item->delete()) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function clear(Request $request)
    {
        $status = $request->input('status');
        if (!in_array($status, [Order::DECLINED, Order::ACCEPTED])) abort(404);
        Order::clear($status);
        Notify::success('История очищена');

        return redirect()->back();
    }
}
