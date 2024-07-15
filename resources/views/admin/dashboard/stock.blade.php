@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('content')
    <div class="section-body">

        <div class="row">

            <div class="col-md-12">

                <h5 class="ml-1">Grafik Stok Material</h5>
                <div class="card my-2 p-2" style="">
                    <canvas style="width: 1000px!important" id="barChart"></canvas>

                </div>
            </div>
        </div>

        <h5 class="ml-1 mt-2">Data Tabel Stok Material</h5>
        <div class="card my-2 p-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-data" id="table-stock-inventory">
                    <thead class="text-uppercase">
                        <tr>
                            <th class="w-5p">No</th>
                            <th class="w-15p ">Grup Material</th>
                            <th class="">Material</th>
                            <th class="w-10p text-center">Qty</th>
                        </tr>
                    </thead>
                    @php
                        $data_arr = [];
                    @endphp
                    @forelse ($data_stock as $key => $item)
                        @php
                            array_push($data_arr, $item);
                        @endphp
                        <tr>
                            <td class="w-5p">{{ $key + 1 }}</td>
                            <td class="w-15p ">{{ $item->category_material_name }}</td>
                            <td class="">{{ $item->material_name }}</td>
                            <td class="w-10p text-center">{{ number_format($item->material_stock_qty) }}</td>
                        </tr>
                    @empty
                    @endforelse
                </table>

            </div>
        </div>


        @php
            $json_data = json_encode($data_arr);
        @endphp
        <input type="hidden" value="{{ $json_data }}" id="json_value_stock">

    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dataStock = JSON.parse($("#json_value_stock").val());
        console.log(dataStock)
        const ctx = document.getElementById('barChart').getContext('2d');

        var labelName = [];
        var dataQty = [];
        dataStock.forEach(ds => {
            labelName.push(ds.material_name);
            dataQty.push(ds.material_stock_qty);
        });

        const myChart = new Chart(ctx, {
            type: 'bar',
            responsive: true,
            data: {
                labels: labelName,
                datasets: [{
                    label: '# of quantity material',
                    data: dataQty,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
            }
        });
    </script>
@endpush
