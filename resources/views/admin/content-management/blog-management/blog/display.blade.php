@php
    // use Illuminate\Support\Facades\DB;
    // $category = DB::table('category_articles')->select('category_articles.*')->get();
@endphp
<table class="table datatables table-bordered table-hover table-data" id="table-blog">
    <thead>
        <tr class="text-uppercase">
            <th class="w-5p">No</th>
            <th class="w-15p">Kategori</th>
            <th>Title</th>
            <th class="w-15p">Tanggal</th>
            <th class="w-10p">Status</th>
            <th class="w-5p">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr @if ($item->is_favorite == 'yes') class="text-success font-weight-bold" @endif>
                <td class="w-5p">{{ $key + 1 }}</td>
                <td class="w-15p">{{ $item->category->name }}
                </td>
                <td>{{ $item->headline }}</td>
                <td class="w-15p">{{ date_format(date_create($item->date_archieve), 'd F Y') }}</td>
                <td class="w-10p">{{ $item->status }}</td>
                <td class="w-5p">

                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <label class="dropdown-item pointer"
                            onclick="activityDetail('homepage','detail','{{ $item->id }}')"><span
                                class="mr-2 fe fe-info"></span>Detail</label>
                        <label class="dropdown-item pointer"
                            onclick="activityDetail('homepage','edit','{{ $item->id }}')"><span
                                class="mr-2 fe fe-edit"></span>Edit</label>
                        @if ($item->is_active == 'yes')
                            <label class="dropdown-item pointer"
                                onclick="manageData('hide','{{ $item->id }}')"><span
                                    class="mr-2 fe fe-eye-off"></span>Hide</label>
                        @elseif ($item->is_active == 'no')
                            <label class="dropdown-item pointer"
                                onclick="manageData('unhide','{{ $item->id }}')"><span
                                    class="mr-2 fe fe-eye"></span>Unhide</label>
                        @endif
                    </div>
                    {{-- <div class="btn-group btn-group-sm" role="group">
                        @if ($item->is_favorite == 'yes')
                            <button type="button" class="btn p5x btn-sm btn-outline-secondary"
                                onclick="manageData('unfavorite',{{ $item->id }}, '{{ $item->title }}')"><span
                                    class="fe fe-slash"></span></button>
                        @elseif($item->is_favorite == 'no')
                            <button type="button" class="btn p5x btn-sm btn-outline-success"
                                onclick="manageData('favorite',{{ $item->id }}, '{{ $item->title }}')"><span
                                    class="fe fe-star"></span></button>
                        @endif
                        <button type="button" class="btn p5x btn-sm btn-outline-warning"
                            onclick="openForm('article','edit', {{ $item->id }})"><span
                                class="fe fe-edit"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-danger"
                            onclick="manageData('delete',{{ $item->id }}, '{{ $item->title }}')"><span
                                class="fe fe-trash"></span></button> --}}
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak terdapat data Blog</td>
            </tr>
        @endforelse
    </tbody>
</table>
