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
                <td class="w-15p">
                    {{-- @php
                        $arrayCategory = explode(',', $item->id_category);
                        $matchingCategoryArticles = [];
                        $uniqueCategoryIds = [];

                        foreach ($arrayCategory as $categoryId) {
                            if (!in_array($categoryId, $uniqueCategoryIds)) {
                                $matchingArticle = $category->firstWhere('id', $categoryId);
                                if ($matchingArticle) {
                                    $matchingCategoryArticles[] = $matchingArticle;
                                    $uniqueCategoryIds[] = $categoryId;
                                }
                            }
                        }
                        $implodeResult = implode(', ', array_column($matchingCategoryArticles, 'name'));
                        echo $implodeResult;
                    @endphp --}}
                </td>
                <td>{{ $item->headline }}</td>
                <td class="w-15p">{{ date_format(date_create($item->date_archieve), 'd F Y') }}</td>
                <td class="w-10p">XXX</td>
                <td class="w-5p">
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
