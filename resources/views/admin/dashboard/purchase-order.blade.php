@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('content')
    <div class="section-body">


        <div class="row">
            <div class="col-md-4">
                <h5 class="ml-1">Grafik Top 5 Supplier & PO</h5>
                <div class="card my-2 p-2" style="">
                    <canvas style="" id="pieChart"></canvas>

                </div>
            </div>
            <div class="col-md-8">

                <h5 class="ml-1 mt-2">Data Tabel Top 5 Supplier PO</h5>
                <div class="card my-2 p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-data" id="table-stock-inventory">
                            <thead class="text-uppercase">
                                <tr>
                                    <th class="w-5p">No</th>
                                    <th class=" ">Supplier</th>
                                    <th class="">Total Pembelian</th>
                                </tr>
                            </thead>
                            @php
                                $data_arr = [];
                            @endphp
                            @forelse ($data_po as $key => $item)
                                @php
                                    array_push($data_arr, $item);
                                @endphp
                                <tr>
                                    <td class="w-5p">{{ $key + 1 }}</td>
                                    <td class="">{{ $item->supplier_name }}</td>
                                    <td class="text-center">{{ number_format($item->total_po_amount) }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </table>

                    </div>
                </div>
            </div>
        </div>

        @php
            $json_data = json_encode($data_arr);
        @endphp
        <input type="hidden" value="{{ $json_data }}" id="json_value_po">

    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dataStock = JSON.parse($("#json_value_po").val());
        console.log(dataStock)
        const ctx = document.getElementById('pieChart').getContext('2d');

        var labelName = [];
        var dataQty = [];
        dataStock.forEach(ds => {
            labelName.push(ds.supplier_name);
            dataQty.push(ds.total_po_amount);
        });

        const myChart = new Chart(ctx, {
            type: 'pie',
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
