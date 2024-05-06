<ul class="flex flex-col justify-center cabinet-bar">
    <li class="{{ $active == 'userData' ? 'active' : null }}">
        <a href="{{ route('cabinet.profile.settings') }}" class="bg-headerBg h-full flex justify-between items-center ml-2">
            <div class="flex items-center justify-center px-3 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28"
                     height="28" viewBox="0 0 28 28">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_2080" data-name="Rectangle 2080" width="28" height="28"
                                  transform="translate(253 375)" fill="#030303" stroke="#707070" stroke-width="1"/>
                        </clipPath>
                    </defs>
                    <g id="Mask_Group_33" data-name="Mask Group 33" transform="translate(-253 -375)"
                       clip-path="url(#clip-path)">
                        <path id="_001-user" data-name="001-user"
                              d="M22.407,20.015l-4.458-2.229a1.228,1.228,0,0,1-.682-1.1V15.1c.107-.131.219-.28.336-.444a10.68,10.68,0,0,0,1.379-2.706,1.852,1.852,0,0,0,1.086-1.688V8.4A1.861,1.861,0,0,0,19.6,7.175V4.693a4.183,4.183,0,0,0-.976-3.045A5.874,5.874,0,0,0,14,0,5.875,5.875,0,0,0,9.376,1.647,4.184,4.184,0,0,0,8.4,4.693V7.175A1.861,1.861,0,0,0,7.933,8.4v1.867a1.856,1.856,0,0,0,.7,1.451,9.794,9.794,0,0,0,1.635,3.377v1.544a1.233,1.233,0,0,1-.643,1.083L5.461,19.992a4.208,4.208,0,0,0-2.194,3.7V25.2C3.267,27.415,10.288,28,14,28s10.733-.585,10.733-2.8V23.78A4.187,4.187,0,0,0,22.407,20.015ZM23.8,25.2c0,.633-3.459,1.867-9.8,1.867S4.2,25.833,4.2,25.2V23.689a3.274,3.274,0,0,1,1.708-2.877l4.163-2.271a2.167,2.167,0,0,0,1.129-1.9V14.763l-.109-.13a8.81,8.81,0,0,1-1.591-3.3l-.042-.185-.159-.1a.931.931,0,0,1-.432-.783V8.4a.921.921,0,0,1,.313-.688l.154-.139V4.667l0-.061a3.24,3.24,0,0,1,.749-2.343A5.013,5.013,0,0,1,14,.933a5.024,5.024,0,0,1,3.913,1.32,3.285,3.285,0,0,1,.757,2.352l0,2.968.154.139a.919.919,0,0,1,.313.688v1.867a.928.928,0,0,1-.664.886l-.232.071-.075.231a9.769,9.769,0,0,1-1.323,2.666,6.14,6.14,0,0,1-.391.5l-.116.133v1.925a2.155,2.155,0,0,0,1.2,1.938l4.458,2.229A3.258,3.258,0,0,1,23.8,23.78Z"
                              transform="translate(253 375)" fill="#030303"/>
                    </g>
                </svg>
            </div>
            <div class="flex-1 flex md:border-none border-b border-gray flex justify-between items-center py-3 px-2 bg-headerBg">
                <p style="margin: 0" class="">Անձնական տվյալներ</p>
                <i class="sm:hidden block fa fa-arrow-right" aria-expanded="true"></i>
            </div>
        </a>
    </li>

    <li class="{{ $active == 'userFavorites' ? 'active' : null }}">
        <a href="{{ route('cabinet.profile.favorite') }}" class="h-full flex justify-between items-center ml-2">
            <div class="flex items-center justify-center px-3 py-3">
                <svg id="_001-love" data-name="001-love" xmlns="http://www.w3.org/2000/svg" width="23.659"
                     height="19.87" viewBox="0 0 23.659 19.87">
                    <g id="Group_5599" data-name="Group 5599" transform="translate(0 0)">
                        <path id="Path_12499" data-name="Path 12499"
                              d="M21.7,42.829a6.85,6.85,0,0,0-9.334,0l-.535.508-.535-.508a6.851,6.851,0,0,0-9.335,0,6.122,6.122,0,0,0,0,8.979l9.3,8.827a.83.83,0,0,0,1.143,0l9.3-8.827a6.121,6.121,0,0,0,0-8.979ZM20.555,50.6l-8.725,8.284L3.1,50.6a4.462,4.462,0,0,1,0-6.572,5.17,5.17,0,0,1,7.046,0l1.107,1.051a.83.83,0,0,0,1.144,0l1.107-1.052a5.171,5.171,0,0,1,7.046,0,4.462,4.462,0,0,1,0,6.572Z"
                              transform="translate(0 -40.993)" fill="#818181"/>
                    </g>
                </svg>
            </div>
            <div class="flex-1 flex md:border-none border-b border-gray flex justify-between items-center py-3 px-2">
                <p style="margin: 0" class="">Հավանածներ</p>
                <i class="sm:hidden block fa fa-arrow-right" aria-expanded="true"></i>
            </div>
        </a>
    </li>

    <li class="{{ $active == 'userBasket' ? 'active' : null }}">
        <a href="{{ route('cabinet.basket.all') }}" class="h-full flex justify-between items-center ml-2">
            <div class="flex items-center justify-center px-3 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.406" height="18.343" viewBox="0 0 20.406 18.343">
                    <path id="_001-shopping-cart" data-name="001-shopping-cart"
                          d="M9.857,124.738a1.695,1.695,0,1,1-1.695-1.695A1.695,1.695,0,0,1,9.857,124.738Zm5.167-1.695a1.695,1.695,0,1,0,1.695,1.695A1.695,1.695,0,0,0,15.024,123.043Zm5.26-7.955-2.085,6.2a1.119,1.119,0,0,1-1.052.92H6.617c-1.05,0-1.094-1.153-1.094-1.153s-1.119-8.3-1.174-8.8-.7-.873-.7-.873L.893,110.089c-1.511-.79-.824-2.293,0-1.948,3.5,1.651,5.124,2.463,5.229,3.113s.29,2.22.29,2.22v.01l.037-.01h12.9C20.9,113.474,20.284,115.091,20.284,115.088Zm-3.016,3.451H7.038l.21,1.668h9.523Zm.994-3.364H6.616l.224,1.783H17.735Z"
                          transform="translate(0 -108.09)" fill="#818181"/>
                </svg>
            </div>
            <div class="flex-1 flex md:border-none border-b border-gray flex justify-between items-center py-3 px-2">
                <p style="margin: 0" class="">Զամբյուղը</p>
                <i class="sm:hidden block fa fa-arrow-right" aria-expanded="true"></i>
            </div>
        </a>
    </li>

    <li class="{{ $active == 'userOrders' ? 'active' : null }}">
        <a href="" class="h-full flex justify-between items-center ml-2">
            <div class="flex items-center justify-center px-3 py-3">
                <svg id="_001-shopping" data-name="001-shopping" xmlns="http://www.w3.org/2000/svg" width="20.672"
                     height="20.672" viewBox="0 0 20.672 20.672">
                    <path id="Path_12542" data-name="Path 12542"
                          d="M452.4,366.807a.4.4,0,1,0-.4-.4A.4.4,0,0,0,452.4,366.807Zm0,0"
                          transform="translate(-433.751 -351.223)" fill="#818181"/>
                    <path id="Path_12543" data-name="Path 12543"
                          d="M1.211,20.672H19.461a1.213,1.213,0,0,0,1.211-1.211V4.441a.4.4,0,0,0-.4-.4H17.442a4.037,4.037,0,1,0-8.075,0H6.3a.4.4,0,0,0-.4.4V9.125H.4a.4.4,0,0,0-.4.4v9.932A1.213,1.213,0,0,0,1.211,20.672Zm-.4-1.211V18.007h9.367v1.453a.4.4,0,0,1-.4.4H1.211A.4.4,0,0,1,.807,19.461Zm18.653.4H10.913a1.206,1.206,0,0,0,.069-.4V18.007h8.882v1.453a.4.4,0,0,1-.4.4ZM13.4.807a3.234,3.234,0,0,1,3.23,3.23h-6.46A3.228,3.228,0,0,1,13.4.807ZM6.7,4.845H9.367V6.7h-.4a.4.4,0,0,0,0,.807h1.615a.4.4,0,0,0,0-.807h-.4V4.845h6.46V6.7h-.4a.4.4,0,0,0,0,.807h1.615a.4.4,0,0,0,0-.807h-.4V4.845h2.422V17.2H10.982V9.528a.4.4,0,0,0-.4-.4H6.7Zm3.472,5.087V17.2H.807V9.932Zm0,0"
                          fill="#818181"/>
                    <path id="Path_12544" data-name="Path 12544"
                          d="M66.4,286.807v.807a2.422,2.422,0,0,0,4.845,0v-.807a.4.4,0,0,0,0-.807h-.807a.4.4,0,0,0,0,.807v.807a1.615,1.615,0,0,1-3.23,0v-.807a.4.4,0,0,0,0-.807H66.4a.4.4,0,0,0,0,.807Zm0,0"
                          transform="translate(-63.335 -274.453)" fill="#818181"/>
                    <path id="Path_12545" data-name="Path 12545"
                          d="M452.4,250.037a.4.4,0,0,0,.4-.4V246.4a.4.4,0,1,0-.807,0v3.23A.4.4,0,0,0,452.4,250.037Zm0,0"
                          transform="translate(-433.751 -236.068)" fill="#818181"/>
                </svg>
            </div>
            <div class="flex-1 flex md:border-none border-b border-gray flex justify-between items-center py-3 px-2">
                <p style="margin: 0" class="">Իմ գնումները</p>
                <i class="sm:hidden block fa fa-arrow-right" aria-expanded="true"></i>
            </div>
        </a>
    </li>

    <li class="{{ $active == 'logout' ? 'active' : null }}">
        <form action="{!! route('user.logout') !!}" enctype="multipart/form-data" method="post">
            @csrf
            <button class="h-full flex justify-between items-center ml-2 w-full" type="submit">
                <div class="flex items-center justify-center px-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.333" height="21.294" viewBox="0 0 23.333 21.294">
                        <g id="_001-logout" data-name="001-logout" transform="translate(0 -0.001)">
                            <g id="Group_6141" data-name="Group 6141" transform="translate(0 8.203)">
                                <g id="Group_6140" data-name="Group 6140" transform="translate(0 0)">
                                    <path id="Path_12555" data-name="Path 12555"
                                          d="M149.484,204.244l2.5-1.76a.684.684,0,0,1,1.078.559v1.077h11.988a.684.684,0,0,1,0,1.367H153.058v1.077a.684.684,0,0,1-1.078.559l-2.5-1.76A.685.685,0,0,1,149.484,204.244Z"
                                          transform="translate(-149.195 -202.358)" fill="#00477e"/>
                                </g>
                            </g>
                            <g id="Group_6143" data-name="Group 6143" transform="translate(3.374 0.001)">
                                <g id="Group_6142" data-name="Group 6142" transform="translate(0 0)">
                                    <path id="Path_12556" data-name="Path 12556"
                                          d="M.341,37.433a.684.684,0,0,1,.934.249,9.279,9.279,0,1,0,0-9.279A.684.684,0,1,1,.092,27.72a10.647,10.647,0,1,1,0,10.648A.684.684,0,0,1,.341,37.433Z"
                                          transform="translate(0 -22.397)" fill="#00477e"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex-1 flex md:border-none border-b border-gray flex justify-between items-center py-3 px-2">
                    <p style="margin: 0" class="">Ելք</p>
                    <i class="sm:hidden block fa fa-arrow-right" aria-expanded="true"></i>
                </div>
            </button>
        </form>
    </li>
</ul>
