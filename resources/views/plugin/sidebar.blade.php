@foreach($permissions as $item)
    @if(array_key_exists('children', $item))
        <li>
            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">{{ $item['guard_name'] }}</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                @foreach ($item['children'] as $val)
                    @if(array_key_exists('children', $val))
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route($val['name']) }}"><i class="fa fa-th-large"></i> <span class="nav-label">{{ $val['guard_name'] }}</span></a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    @else
        <li>
            <a href="{{ route($item['name']) }}"><i class="fa fa-th-large"></i> <span class="nav-label">{{ $item['guard_name'] }}</span></a>
        </li>
    @endif
@endforeach

