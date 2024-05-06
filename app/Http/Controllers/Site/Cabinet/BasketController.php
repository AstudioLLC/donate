<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use App\Models\Item;
use App\Services\BasketService\BasketFactory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BasketController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function getBasketItems()
    {
        $basketService = BasketFactory::createDriver();
        $response = $basketService->getItems();

        return response()->json($response->toArray());
    }

    public function getSmallBasket()
    {
        return 1;
        return response()->view('site.components.small-basket.constructor');
    }

    /**
     * @param Request $request
     * @return Response|mixed|object
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'itemId' => 'required|exists:items,id',
            'count' => 'required|numeric|min:1'
        ]);

        $item = Item::getItem($request->input('itemId'));

        $count = $this->setCount($request->input('count'), $item->count);

        $data = [
            'count' => $count,
        ];

        if ($request->has('sizeId')) {
            $data['size'] = $request->input('sizeId');
        }
        if (!$item) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_NOT_FOUND);
        } elseif (!$item->price) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $basketService = BasketFactory::createDriver();

        if (!$basketService->add($item->id, $data)) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->make('Added')->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @return Response|mixed|object
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'itemId' => 'required|exists:items,id',
            'count' => 'required|numeric|min:1'
        ]);
        $type = $request->input('type') ?? null;

        $item = Item::getItem($request->input('itemId'));

        if (!$item) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        if ($item->count == 0) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        if ($item->price == 0) {
            return response()->make('Failed')->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $basketService = BasketFactory::createDriver();

        if ($basketService->getItemById($item->id)) {
            foreach ($basketService->getItems() as $basketItem) {
                if ($basketItem->getItemId() == $item->id) {
                    if ($type) {
                        $count = $this->setCount($request->input('count'), $item->count);
                    } else {
                        $count = $this->setCount($request->input('count') + $basketItem->getCount(), $item->count);
                    }
                    $data = [
                        'count' => $count
                    ];
                    if (!$basketService->update($item->id, $data)) {
                        return response()->make('Failed')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                }
            }
        }else {
            $count = $this->setCount($request->input('count'), $item->count);
            $data = [
                'count' => $count
            ];
            if (!$basketService->add($item->id, $data)) {
                return response()->make('Failed')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        return response()->make('Updated')->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse|Response|mixed|object
     * @throws BindingResolutionException
     * @throws ValidationException
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'itemId' => 'required|exists:items,id'
        ]);

        $basketService = BasketFactory::createDriver();

        if (!$basketService->delete($request->input('itemId'))) {
            return response()->json([
                'message' => 'Error'
            ])->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->make('Deleted')->setStatusCode(Response::HTTP_OK);
    }

    private function setCount($count, $maxCount)
    {
        if ($count >= $maxCount) {
            $count = $maxCount;
        }
        return $count;
    }

    public function basket()
    {
        $data['title'] = 'Моя корзина ';
        $data['active'] = 'basket';
        $data['seo'] = $this->staticSEO(__('cabinet.profile settings'));

        $breadcrumbs = [
            [
                'title' => __('cabinet.profile settings'),
                'url' => ''
            ]
        ];

        $data['breadcrumbs'] = $breadcrumbs;

        return view('site.pages.cabinet.basket', $data);
    }
}
