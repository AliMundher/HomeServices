<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{$category_name}} Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>{{$category_name}} Services</li>
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
                                    <h4>{{$category_name}}</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#"
                                    class="btn btn-success" style="margin-bottom:10px">Add New Service</a>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">{{session('message')}}</div>
                                    @endif
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td>
                                                <img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}"
                                                    alt="{{$service->name}}" height="60" width="100%">
                                            </td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->price}}</td>
                                            <td>
                                                @if ($service->status)
                                                    activ
                                                @else
                                                    inactive
                                                @endif
                                            </td>
                                            <td>{{$service->category->name}}</td>
                                            <td>{{$service->created_at}}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary" style="margin-right:0">Edit</a>
                                                <a href="#" class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="moon">
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
