<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>All Slides</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>All Slides</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>All Slides</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('admin.add_slider')}}"
                                    class="btn btn-success" style="margin-bottom:10px">Add New Slide</a>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">{{session('message')}}</div>
                                    @endif
                                    @foreach ($slides as $slide)
                                        <tr>
                                            <td>{{$slide->id}}</td>
                                            <td>
                                                <img src="{{asset('images/slider')}}/{{$slide->image}}"
                                                    alt="{{$slide->title}}" height="60" width="100%">
                                            </td>
                                            <td>{{$slide->title}}</td>
                                            <td>
                                                @if ($slide->status)
                                                    activ
                                                @else
                                                    inactive
                                                @endif
                                            </td>
                                            <td>{{$slide->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.edit_slider',
                                                    ["service_id"=>$slide->id])}}" class="btn btn-primary" style="margin-right:0">Edit</a>
                                                <a href="#" wire:click.prevent="deleteSlider({{$slide->id}})"
                                                    onclick="confirm('Are you sure you want to delete this slider?')||
                                                    event.stopImmediatePropagation()"
                                                    class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="moon">
                                {{ $slides->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
