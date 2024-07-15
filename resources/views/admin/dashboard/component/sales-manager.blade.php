<span class="" for=""><b>Team Achievement</b></span>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1 mb-3">
            <div class="card-wrap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">
                                    <span class="" for="">Total Project & Training</span>
                                    <h1>{{ number_format($sm_data['value']['total']) }}</h1>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="" for="">Project</span>
                                    <h5>{{ number_format($sm_data['value']['project']) }}</h5>
                                    {{ number_format($sm_data['percentage']['project']) }} %
                                </div>
                                <div class="col-md-4">
                                    <span class="" for="">In House Training</span>
                                    <h5>{{ number_format($sm_data['value']['in_house']) }}</h5>
                                    {{ number_format($sm_data['percentage']['in_house']) }} %
                                </div>
                                <div class="col-md-4">
                                    <span class="" for="">Public Training</span>
                                    <h5>{{ number_format($sm_data['value']['public_training']) }} </h5>
                                    {{ number_format($sm_data['percentage']['public_training']) }} %
                                </div>
                            </div>
                        </div>


                        <div>
                            <input type="hidden" id="sm_project_amount" value="{{ $sm_data['value']['project'] }}">
                            <input type="hidden" id="sm_in_house_amount" value="{{ $sm_data['value']['in_house'] }}">
                            <input type="hidden" id="sm_public_training_amount"
                                value="{{ $sm_data['value']['public_training'] }}">
                        </div>
                        <div class="col-md-3">
                            <canvas id="TeamAchivementChart" width="100"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<span class="" for=""><b>Personal Achievement</b></span>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1 mb-3">
            <div class="card-wrap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">
                                    <span class="" for="">Total Project & Training</span>
                                    <h1>{{ number_format($data['value']['total']) }}</h1>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="" for="">Project</span>
                                    <h5>{{ number_format($data['value']['project']) }}</h5>
                                    {{ number_format($data['percentage']['project']) }} %
                                </div>
                                <div class="col-md-4">
                                    <span class="" for="">In House Training</span>
                                    <h5>{{ number_format($data['value']['in_house']) }}</h5>
                                    {{ number_format($data['percentage']['in_house']) }} %
                                </div>
                                <div class="col-md-4">
                                    <span class="" for="">Public Training</span>
                                    <h5>{{ number_format($data['value']['public_training']) }} </h5>
                                    {{ number_format($data['percentage']['public_training']) }} %
                                </div>
                            </div>
                        </div>


                        <div>
                            <input type="hidden" id="project_amount" value="{{ $data['value']['project'] }}">
                            <input type="hidden" id="in_house_amount" value="{{ $data['value']['in_house'] }}">
                            <input type="hidden" id="public_training_amount"
                                value="{{ $data['value']['public_training'] }}">
                        </div>
                        <div class="col-md-3">
                            <canvas id="PersonalAchievementChart" width="100"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<h5 class="ml-1">My Activities</h5>
<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="  align-items: center;">
                <i class="fe fe-users fe-16 text-danger"></i>
                <h5 class="mx-2 mb-0">Project</h5>
                <span class="badge badge-pill rounded badge-dark text-white pt-2">{{ number_format($data['value']['project']) }}</span>
                {{-- <label class="mx-2 mb-0">1 Weeks Ahead</label> --}}
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-next-follow-up"
                    onclick="showData('next-follow-up')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-next-follow-up" onclick="closeData('next-follow-up')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-next-follow-up">
        <table class="table table-hover dt-table">
            <thead>
                <tr>
                    <th class="w-25">Client Name</th>
                    <th class="w-auto">Project Title</th>
                    <th style="width:100px;">Status</th>
                </tr>
            </thead>

            <tbody class="text-black" style="font-size:12px;">
                @foreach ($my_activity['next_follow_up'] as $proj)
                    <tr id="tr-project-{{ $proj->id }}">
                        <td>{{ $proj->client_name }}</td>
                        <td>{{ $proj->client_name }}</td>
                        <td>
                            <button class="btn btn-sm btn-success">On Going</button>
                            <button class="btn btn-sm btn-secondary"
                                onClick="viewDetailActivity('project', {{ $proj->id }})">V</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="align-items: center;">
                <i class="fe fe-users fe-16 text-danger"></i>
                <h5 class="mx-2 mb-0">In-House Training</h5>
                <span class="badge badge-pill rounded badge-dark text-white pt-2">{{ number_format($data['value']['in_house']) }}</span>
                {{-- <label class="mx-2 mb-0">1 Weeks Ahead</label> --}}
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-in-house-training"
                    onclick="showData('in-house-training')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-in-house-training" onclick="closeData('in-house-training')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-in-house-training">
        <table class="table table-hover dt-table">
            <thead>
                <tr>
                    <th class="w-25">Client Name</th>
                    <th class="w-auto">Project Title</th>
                    <th style="width:100px;">Status</th>
                </tr>
            </thead>

            <tbody class="text-black" style="font-size:12px;">
                @foreach ($my_activity['next_follow_up'] as $proj)
                    <tr id="tr-inhouse-training-{{ $proj->id }}">
                        <td>{{ $proj->client_name }}</td>
                        <td>{{ $proj->client_name }}</td>
                        <td>
                            <button class="btn btn-sm btn-success">On Going</button>
                            <button class="btn btn-sm btn-secondary"
                                onClick="viewDetailActivity('inhouse-training', {{ $proj->id }})">V</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="  align-items: center;">
                <i class="fe fe-users fe-16 text-danger"></i>
                <h5 class="mx-2 mb-0">Public Training</h5>
                <span class="badge badge-pill rounded badge-dark text-white pt-2">{{ number_format($data['value']['public_training']) }}</span>
                {{-- <label class="mx-2 mb-0">1 Weeks Ahead</label> --}}
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-public-training"
                    onclick="showData('public-training')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-public-training" onclick="closeData('public-training')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-public-training">
        <table class="table table-hover dt-table">
            <thead>
                <tr>
                    <th class="w-25">Client Name</th>
                    <th class="w-auto">Project Title</th>
                    <th style="width:100px;">Status</th>
                </tr>
            </thead>
            <tbody class="text-black" style="font-size:12px;">
                @foreach ($my_activity['next_follow_up'] as $proj)
                    <tr id="tr-public-training-{{ $proj->id }}">
                        <td>{{ $proj->client_name }}</td>
                        <td>{{ $proj->client_name }}</td>
                        <td>
                            <button class="btn btn-sm btn-success">On Going</button>
                            <button class="btn btn-sm btn-secondary"
                                onClick="viewDetailActivity('public-training', {{ $proj->id }})">V</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
