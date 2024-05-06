<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Services\ImageUploader\ImageUploader;
use App\Services\Notify\Facades\Notify;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class BannersControllerAdmin extends AdminBaseController
{
    private $data = [];
    private $notify = false;
    private $page;
    private $settings = [
        'home' => [
            'main_banner' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                ]
            ],

        ],
        'register' => [
            'content' => [
                'params' => [
                    'left' => 'editor',
                    'right' => 'editor',
                ]
            ],

        ],
        'about' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 487, true],
                        'hint' => false,
                    ],
                    'image1' => [
                        'type' => 'image',
                        'resize' => ['resize', 580, 550, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'interiorDesign' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'loan' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'measurement' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'promotions' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'discounts' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'newItems' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ],
        ],
        'about_project' => [
            'content' => [
                'params' => [
                    'top_text' => 'textarea',
                    'bottom_text' => 'text',
                ]
            ],
        ],

        'home_big_image_banners' => [
            'content' => [
                'params' => [
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 320, true],
                        'hint' => false,
                    ],
                    'title' => 'title',
                    'text' => 'title',
                    'url_text' => 'title',
                    'url' => 'input',

                ]
            ],
            'home' => [
                'params' => [
                    'title' => 'title',
                    'desc' => 'textarea',
                ]
            ],
        ],


        'contact' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'text' => 'text',
                    'first' => 'title',
                    'second' => 'title',
                    'third' => 'title',
                    'button' => 'title',
                    'contact_title' => 'title'
                ]
            ]
        ],


        'news' => [
            'content' => [
                'params' => [
                    'title' => 'title',
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ]
        ],

        'catalog' => [
            'content' => [
                'params' => [
                    'content' => 'text',
                    'image' => [
                        'type' => 'image',
                        'resize' => ['resize', 1440, 292, true],
                        'hint' => false,
                    ],
                ]
            ]
        ],


        'info' => [
            'seo' => [
                'params' => [
                    'title_suffix' => 'title',
                ]
            ],
            'contacts' => [
                'count' => 4,
                'params' => [
                    'phone' => 'input',
                    'email' => 'input',
                    'address' => 'title'
                ]
            ],
            'payments' => [
                'count' => 5,
                'params' => [
                    'image' => [
                        'type' => 'image',
                        'original_file' => 'true'
                    ],
                    'title' => 'input',
                    'active' => 'labelauty'
                ]
            ],
            'data' => [
                'params' => [
                    'header_logo' => [
                        'type' => 'image',
                        'original_file ' => true,
                    ],
                    'worktime' => 'title',
                    'menu_logo' => [
                        'type' => 'image',
                        'original_file ' => true,
                    ],
                    'iframe' => 'input',
                    'contact_email' => 'input',
                    'min_sum' => [
                        'type' => 'number',
                        'min' => '0',
                        'max' => '99999',
                    ],
                    'product_image' => [
                        'type' => 'image',
                        'resize' => ['fit', 512, 288, true]
                    ],
                    'options_selected' => 'labelauty',
                ]
            ],
            'socials' => [
                'count' => 10,
                'params' => [
                    'icon' => [
                        'type' => 'image',
                        'original_file' => 'true'
                    ],
                    'title' => 'input',
                    'url' => 'input',
                ]
            ],
        ],

    ];

    public function fixBanners()
    {
        Banner::fixBanners($this->settings);
    }

    public function renderPage($page)
    {

        if (!array_key_exists($page, $this->settings)) abort(404);
        $this->page = $page;
        $this->data['params'] = $this->settings[$page];

        return $this->render();
    }

    private function render()
    {
        $this->data['banners'] = Banner::getBanners($this->page);
        if (Request::getMethod() == 'POST') {
            return $this->post();
        }

        return view('admin.pages.banners.' . $this->page, $this->data);
    }

    private function post()
    {
        $request = Request::all();
        foreach ($this->data['params'] as $key => $params) {
            if (array_key_exists($key, $request)) {
                $inputs = $request[$key];
                $count = $params['count'] ?? 1;
                for ($i = 0; $i < $count; $i++) {
                    $this->updateData($params['params'], $inputs[$i] ?? null, $key, $i);
                }
            }
        }
        if ($this->notify) {
            Cache::forget(Banner::cacheKey($this->page));
            Notify::get(t('Admin action notify.success edited'));
        }

        return redirect()->back();

    }

    private function updateData($params, $inputs, $key, $i)
    {
        if (arraySize($inputs)) {
            $data = [];
            foreach ($params as $index => $param) {
                if (is_array($param)) {
                    $type = $param['type'];
                    unset($param['type']);
                    $settings = $param;
                } else {
                    $type = $param;
                    $settings = [];
                }
                $banner = $this->data['banners'][$key][$i]['data'][$index] ?? null;
                $data[$index] = $this->updateParam($type, $settings, $inputs[$index] ?? null, $banner);
            }
            if (arraySize($data)) {
                $id = $this->data['banners'][$key][$i]['id'] ?? false;
                if (Banner::updateBanner($this->page, $key, $data, $id)) $this->notify = true;
            }
        }

        return true;
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = Request::input('item_id');
        if ($id && is_id($id)) {
            $page = Banner::where('id', $id)->first();
            if ($page && Banner::deleteItem($page)) $result['success'] = true;
        }

        return response()->json($result);
    }

    private function updateParam($type, $settings, $input, $banner)
    {
        switch ($type) {
            case 'image':
                return $this->typeImage($settings, $input, $banner);
                break;
            case 'file':
                return $this->typeFile($settings, $input, $banner);
                break;
            case 'labelauty':
                return $this->typeCheckbox($input);
                break;
            default:
                return $input;
        }
    }

    private function typeImage($settings, $input, $banner)
    {
        if (empty($settings['original_file'])) {
            $resize = [];
            if (array_key_exists('resize', $settings)) {
                $resize[] = [
                    'method' => $settings['resize'][0],
                    'width' => $settings['resize'][1],
                    'height' => $settings['resize'][2],
                    'upsize' => empty($settings['resize'][3]) ? false : true,
                ];
            } else $resize[] = ['method' => 'original'];
            if ($input && $input->isFile() &&
                $image = upload_image($input, 'u/banners/', $resize, !empty($banner) ? $banner : false)

            ) return $image;
        } else {
            if ($input && $input->isFile() && $image = upload_original_image($input, 'u/banners/', !empty($banner) ? $banner : false)) return $image;
        }

        return $banner;
    }

    private function typeFile($settings, $input, $banner)
    {
        dd($banner);
        if ($input && $input->isFile() &&
            $file = ImageUploader::upload($input)/*upload_file($input, 'u/banners/', !empty($banner) ? $banner : false)*/
        ) return $file;

        return $banner;
    }

    private function typeCheckbox($input)
    {
        return $input ? true : false;
    }

    public function getSettings()
    {
        return $this->settings;
    }

}
