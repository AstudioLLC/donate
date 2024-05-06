<h4>{{count($items)}}</h4>
<table class="table align-items-center table-flush" id="datatable-basic">
    <form action="{{route('admin.bindings.search')}}" method="get">
        @csrf
        <div class="form-group">
            <input class="form-control" name="search" type="search" placeholder="Search" id="example-search-input">
        </div>
    </form>
    <thead class="thead-light">
    <tr>
        <th>Sponsor ID</th>
        <th>Children ID</th>
        <th>Amount</th>
        <th>Started</th>
        <th>Updated</th>
        <th>Next Payment</th>
        <th>Active</th>
        <!--<th class="text-center">Action</th>-->
    </tr>
    </thead>
    <tbody class="list" >
    @foreach($items as $item)
        <tr data-id="{{ $item->id  ?? null}}" class="item-row">
            <td title="{{$item->sponsor->name ?? null}} - {{$item->sponsor_id ?? null}}" class="item-title">
                <a target="_blank" href="{{route('admin.sponsors.show',['id' => $item->user_id])}}">
                    {{ $item->sponsor->options->sponsor_id ?? null}} <br>
                    {{ $item->sponsor->name ?? null}} <br>
                    {{ $item->sponsor->email ?? null}}<br>
{{--                     {{$item->sponsor_id ?? null}}--}}
                </a>
            </td>
            <td>
                <select name="children_id" id="select_child" class="form-control select_child" style="width:150px" >
                    @foreach ($children as $child)
                        @if ($item->children_id == $child->id)
                            @php
                                $bind_child = $child->title;
                                $bind_child_id = $child->child_id
                            @endphp
                            <option value="{{ old('children_id',$item->children_id) }}"disable selected hidden>{{$bind_child_id}} - {{$bind_child}}</option>
                        @endif
                    @endforeach

                    @foreach($children as $child)
                        <option  disable  hidden>Select child</option>
                        <option value="{{$child->id}}">{{$child->child_id}} - {{$child->title}}</option>
                    @endforeach
                </select>
            </td>
            <td>{{$item->amount}}</td>

            <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y-H:i:s')}}</td>

            <td>{{\Carbon\Carbon::parse($item->updated_at)->format('d-m-Y-H:i:s')}}</td>

            <td>{{\Carbon\Carbon::parse($item->must_be)->format('d-m-Y-H:i:s')}}</td>

            <td>
                <label class="custom-toggle active-changer">
                    <input type="checkbox" value="{{ $item->active }}" {{ $item->active ? ' checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </td>
            <!--<td>-->
            <!--    @if($item->active == 0)-->
            <!--    <form action="{{route('admin.bindings.delete',$item->id)}}" method="post">-->
            <!--        @csrf-->
            <!--        @method('DELETE')-->
            <!--        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this sponsor?')">Delete</button>-->
            <!--    </form>-->
            <!--    @else-->
            <!--        <button type="button" class="btn btn-danger" onclick="alert('This sponsor is in active mode')">Delete</button>-->
            <!--    @endif-->
            <!--</td>-->
        </tr>
    @endforeach

    </tbody>
</table>
