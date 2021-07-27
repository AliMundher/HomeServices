<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Category</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Category</li>
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
                                <div class="col"></div>
                                <div class="col pull-right">
                                    <a href="{{route('admin.add_service_category')}}"
                                    class="btn btn-success" style="margin-bottom:10px">Add New Category</a>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">{{session('message')}}</div>
                                    @endif
                                    @foreach ($scategories as $scategory)
                                        <tr>
                                            <td>{{$scategory->id}}</td>
                                            <td>
                                                <img src="{{asset('images/categories')}}/{{$scategory->image}}"
                                                    alt="{{$scategory->name}}">
                                            </td>
                                            <td>{{$scategory->name}}</td>
                                            <td>{{$scategory->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.edit_service_category',['category_id'=>$scategory->id])}}"
                                                    class="btn btn-primary" style="margin-right:0">Edit</a>

                                                <a href="#" onclick="confirm('Are you sure to Delete this category?') ||
                                                    event.stopImmediatePropagation()"
                                                    wire:click.prevent="removeCategory({{$scategory->id}})"
                                                    class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="moon">
                                {{ $scategories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
