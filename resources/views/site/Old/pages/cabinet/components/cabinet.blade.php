<button class="modal-open xl:hidden sm:block hidden profileSettings focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="33.375" height="30.578" viewBox="0 0 33.375 30.578">
        <g id="_001-filter" data-name="001-filter" transform="translate(-64.267 -80.334)">
            <path id="Path_12539" data-name="Path 12539"
                  d="M96.336,83.131H76.452a4.1,4.1,0,0,0-7.776,0h-3.1a1.306,1.306,0,1,0,0,2.611h3.1a4.1,4.1,0,0,0,7.776,0H96.336a1.306,1.306,0,1,0,0-2.611Zm-23.772,2.8a1.491,1.491,0,1,1,1.491-1.491A1.493,1.493,0,0,1,72.564,85.927Z"
                  transform="translate(0)" fill="#474747"/>
            <path id="Path_12540" data-name="Path 12540"
                  d="M96.336,211.664h-3.1a4.1,4.1,0,0,0-7.776,0H65.573a1.306,1.306,0,0,0,0,2.611H85.456a4.1,4.1,0,0,0,7.776,0h3.1a1.306,1.306,0,1,0,0-2.611Zm-6.992,2.8a1.491,1.491,0,1,1,1.491-1.491A1.493,1.493,0,0,1,89.344,214.46Z"
                  transform="translate(0 -117.346)" fill="#474747"/>
            <path id="Path_12541" data-name="Path 12541"
                  d="M96.336,340.2H82.046a4.1,4.1,0,0,0-7.776,0h-8.7a1.305,1.305,0,1,0,0,2.611h8.7a4.1,4.1,0,0,0,7.776,0H96.336a1.305,1.305,0,1,0,0-2.611Zm-18.178,2.8a1.491,1.491,0,1,1,1.491-1.491A1.493,1.493,0,0,1,78.158,342.993Z"
                  transform="translate(0 -234.693)" fill="#474747"/>
        </g>
    </svg>
</button>
<div id="cabinet-tab-settings" class="bg-white w-full absolute sm:h-auto h-screen sm:h-unset z-10 sm:relative sm:bg-blue-lighter xl:block block sm:hidden">
    @include('site.pages.cabinet.components.CabinetList')
</div>
<div class="modal modal-cabinet opacity-0 hidden fixed w-full h-full top-0 left-0 flex items-center shadow justify-center">
    <div class="modal-overlay cabinet-overlay absolute w-full h-full bg-black opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-10 overflow-y-auto">
        <div class="modal-content cabinet-bar-modal py-4 text-left px-6">
            @include('site.pages.cabinet.components.CabinetList')
        </div>
    </div>
</div>
