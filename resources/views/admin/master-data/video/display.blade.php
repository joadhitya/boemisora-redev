<table class="table datatables table-bordered table-hover table-data" id="table-video">
    <thead>
        <tr class="text-uppercase">
            <th class="w-5p">No</th>
            <th>Judul Video</th>
            <th>Link Youtube</th>
            <th class="w-10p">Background Link</th>
            <th class="w-10p">Video Utama</th>
            <th class="w-5p">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr>
                <td class="w-5p">{{ $key + 1 }}</td>
                <td>{{ $item->title }}</td>
                <td><a target="_blank" href="{{ $item->link_youtube }}">{{ $item->link_youtube }}</a></td>
                <td class="w-10p">{{ $item->background_link }}</td>
                <td class="w-10p">{{ $item->is_main_video == 'yes' ? 'Ya' : 'Tidak' }}</td>
                <td class="w-5p">
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn p5x btn-sm btn-outline-warning"
                            onclick="openModal('video','edit', {{ $item->id }})"><span
                                class="fe fe-edit"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-danger"
                            onclick="manageData('delete',{{ $item->id }}, '{{ $item->title }}')"><span
                                class="fe fe-trash"></span></button>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
