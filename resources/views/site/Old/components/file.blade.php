@if($file)
    <a href="{{ asset('u/file/' . $file->name) ?? 'javascript:void(0)' }}"
       download
       class="text-white bg-yellow-custom flex items-center flex-row rounded-full m-1 p-1">
        <p class="bg-white rounded-full flex items-center justify-center h-8 w-8 text-yellow-custom">
            <i class="fa fa-eye"></i>
        </p>
        <p class="px-3">{{ $file->title }}</p>
    </a>
@endif
