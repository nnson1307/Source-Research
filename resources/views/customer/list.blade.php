<div class="table-responsive">
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">#</th>
                <th class="border-0">@lang('Full name')</th>
                <th class="border-0">@lang('Phone')</th>
                <th class="border-0">@lang('Birthday')</th>
                <th class="border-0">@lang('Status')</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            @if (isset($LIST))
                @foreach($LIST as $key => $value)
                    <tr>
                        <td>
                            {{$page > 1 ? $key + 1 + (($page - 1) * $perpage) : $key + 1}}
                        </td>
                        <td>
                            <a href="{{route('customers.show', ['customer' => $value['id']])}}">
                                {{$value['full_name']}}
                            </a>
                        </td>
                        <td>{{$value['phone']}}</td>
                        <td>{{\Carbon\Carbon::parse($value['birthday'])->format('d/m/Y')}}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" {{$value['is_actived'] == 1 ? 'checked' : ''}}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
            @endif
            <!-- End of Item -->
        </tbody>
    </table>
</div>

{{ $LIST->appends($filter ?? null)->links('pagination') }}